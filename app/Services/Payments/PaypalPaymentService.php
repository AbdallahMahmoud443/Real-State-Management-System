<?php

namespace App\Services\Payments;

use App\Services\Orders\OrderServices;
use App\Services\Payments\contracts\PaymentContract;
use App\Services\PricingPackages\PricingPackagesService;
// Import the class namespaces first, before using it directly
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class PaypalPaymentService implements PaymentContract
{

    public function __construct(protected OrderServices $orderServices, protected PricingPackagesService $pricingPackagesService) {}
    public function createOrderWithPaymentGateWay($pricingPackage): RedirectResponse
    {
        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            // Format the price correctly to avoid validation errors

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('agent.paypal.success'),
                    "cancel_url" => route('agent.paypal.cancel')
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $pricingPackage->price
                        ]
                    ]
                ]
            ]);
            // Log the response for debugging
            Log::info('PayPal Create Order Response', ['response' => $response]);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] == 'approve') {
                        session()->put('package_id', $pricingPackage->id);
                        return redirect()->away($link['href']);
                    }
                }
            }
            // Log error if no approval link found
            Log::error('PayPal Error: No approval link found', ['response' => $response]);
            return redirect()->route('agent.paypal.cancel');
        } catch (\Exception $e) {
            Log::error('PayPal Create Order Exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('agent.paypal.cancel');
        }
    }

    public function successPaymentOrder(Request $request)
    {
        try {
            // Check if token exists in request
            if (!$request->has('token')) {
                Log::error('PayPal Error: No token in request');
                return false;
            }
            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            // Add detailed logging before capture attempt
            Log::info('PayPal Capture Attempt', ['token' => $request->token]);
            $response = $provider->capturePaymentOrder($request->token);

            // Log the complete response for debugging
            Log::info('PayPal Response', ['response' => $response]);
            // Check for error in response
            if (isset($response['error'])) {
                Log::error('PayPal API Error', $response);
                return false;
            }
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                // Check if package_id exists in session
                $package_id = session()->get('package_id');
                if (!$package_id) {
                    Log::error('PayPal Error: No package_id in session');
                    return false;
                }
                $pricingPackage = $this->pricingPackagesService->fetchOnePackage($package_id);
                // All Previous orders will be currently_active as false
                $this->orderServices->UpdateAgentOldOrdersState(Auth::guard('agent')->user()->id, ['currently_active' => false]);
                $orderData = [
                    'agent_id' => Auth::guard('agent')->user()->id,
                    'package_id' => $pricingPackage->id,
                    'transaction_id' => $response['id'],
                    'payment_method' => 'paypal',
                    'paid_amount' => $pricingPackage->price,
                    'purchase_date' => date('Y-m-d'),
                    'expire_date' => date('Y-m-d', strtotime('+' . $pricingPackage->allowed_days . 'days')),
                    'status' => 'completed',
                    'currently_active' => true,
                ];
                $newOrder = $this->orderServices->createOrder($orderData);
                session()->forget('package_id');
                return $newOrder;
            }
            Log::error('PayPal Error: Payment not completed', ['status' => $response['status'] ?? 'unknown']);
            return false;
        } catch (\Exception $e) {
            Log::error('PayPal Exception: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'token' => $request->token ?? 'no token'
            ]);
            return false;
        }
    }

    public function cancelPaymentOrder()
    {
        return 'Payment Failed,Please Try Again.';
    }
}
