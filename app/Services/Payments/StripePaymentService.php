<?php

namespace App\Services\Payments;

use App\Services\Payments\contracts\PaymentContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;
use App\Services\PricingPackages\PricingPackagesService;
use App\Services\Orders\OrderServices;
use Illuminate\Support\Facades\Auth;


class StripePaymentService implements PaymentContract
{
    protected $stripe;
    public function __construct(protected OrderServices $orderServices, protected PricingPackagesService $pricingPackagesService)
    {
        // Initialize Stripe client in constructor for reuse
        $this->stripe = new StripeClient(config('stripe.stripe_sk'));
    }

    public function createOrderWithPaymentGateWay($pricingPackage): RedirectResponse
    {
        // Format price correctly (Stripe requires amount in cents)
        $amount = (int)($pricingPackage->price * 100);
        // Create metadata for better tracking
        $metadata = [
            'package_id' => $pricingPackage->id,
            'package_name' => $pricingPackage->name,
            'agent_id' => Auth::guard('agent')->id(),
            'agent_email' => Auth::guard('agent')->user()->email
        ];
        $response = $this->stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $pricingPackage->name,
                            'description' => "Package valid for {$pricingPackage->allowed_days} days",
                            'metadata' => $metadata,
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('agent.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('agent.stripe.cancel'),
            'metadata' => $metadata,
            'customer_email' => Auth::guard('agent')->user()->email,
            'payment_intent_data' => [
                'metadata' => $metadata,
            ],
        ]);
        Log::info('Stripe checkout session created:', ['session_id' => $response->id]);
        if (isset($response->id) && $response->id != null) {
            session()->put('package_id', $pricingPackage->id);
            session()->put('stripe_session_id', $response->id);
            return redirect($response->url);
        }
        Log::error('Stripe Error: Failed to create checkout session');
        return redirect()->route('agent.stripe.cancel');
    }

    public function successPaymentOrder(Request $request)
    {
        if (!$request->has('session_id')) {
            Log::error('Stripe Error: No session_id in request');
            return false;
        }

        $session = $this->stripe->checkout->sessions->retrieve($request->session_id, ['expand' => ['payment_intent']]);
        Log::info('Stripe session retrieved:', ['session_id' => $session->id, 'status' => $session->status]);
        // Verify payment status
        if ($session->payment_status !== 'paid') {
            Log::error('Stripe Error: Payment not completed', [
                'session_id' => $session->id,
                'payment_status' => $session->payment_status
            ]);
            return false;
        }
        // Check if package_id exists in session
        $package_id = session()->get('package_id');
        if (!$package_id) {
            Log::error('Stripe Error: No package_id found');
            return false;
        }
        // Check if package_id is valid
        $pricingPackage = $this->pricingPackagesService->fetchOnePackage($package_id);
        if (!$pricingPackage) {
            Log::error('Stripe Error: Invalid package_id', ['package_id' => $package_id]);
            return false;
        }

        // All Previous orders will be currently_active as false
        $this->orderServices->UpdateAgentOldOrdersState(Auth::guard('agent')->user()->id, ['currently_active' => false]);

        $orderData = [
            'agent_id' => Auth::guard('agent')->user()->id,
            'package_id' => $pricingPackage->id,
            'transaction_id' => $session->payment_intent->id ?? $session->id,
            'payment_method' => 'stripe',
            'paid_amount' => $pricingPackage->price,
            'purchase_date' => date('Y-m-d'),
            'expire_date' => date('Y-m-d', strtotime('+' . $pricingPackage->allowed_days . 'days')),
            'status' => 'completed',
            'currently_active' => true,
        ];
        $newOrder = $this->orderServices->createOrder($orderData);

        session()->forget(['package_id', 'stripe_session_id']);
        Log::info('Stripe payment completed successfully', [
            'order_id' => $newOrder->id,
            'transaction_id' => $orderData['transaction_id']
        ]);
        return $newOrder;
    }
    public function cancelPaymentOrder()
    {
        $session_id = session()->get('stripe_session_id');
        if ($session_id) {
            Log::info('Payment cancelled by user', ['session_id' => $session_id]);
            session()->forget(['package_id', 'stripe_session_id']);
        }
        return 'Payment was cancelled. Please try again.';
    }
}
