<?php

namespace App\Http\Controllers\Agent\Payments;

use App\Http\Controllers\Controller;
use App\Services\Payments\StripePaymentService;
use App\Services\PricingPackages\PricingPackagesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class StripeController extends Controller
{
    public function __construct(protected StripePaymentService $stripePaymentService, protected PricingPackagesService $pricingPackage) {}
    public function stripe(Request $request)
    {
        try {
            $request->validate([
                'package_id' => 'required|exists:pricing_packages,id'
            ]);
            $package_id = $request->input('package_id');
            $pricingPackage = $this->pricingPackage->fetchOnePackage($package_id);
            if (!$pricingPackage) {
                return redirect()->back()->with('error', 'Selected package is not available');
            }
            return $this->stripePaymentService->createOrderWithPaymentGateWay($pricingPackage);
        } catch (\Exception $e) {
            Log::error('Stripe Controller Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your payment. Please try again.');
        }
    }
    public function success(Request $request)
    {
        try {
            if (!$request->has('session_id')) {
                return redirect()->route('agent.payment.show')
                    ->with('error', 'Invalid payment session. Please try again.');
            }
            $newOrder = $this->stripePaymentService->successPaymentOrder($request);
            if ($newOrder instanceof \App\Models\Order) {
                return redirect()->route('agent.payment.show')
                    ->with('success', 'Payment completed successfully! Your package is now active.');
            }
            return redirect()->route('agent.stripe.cancel')
                ->with('error', 'Payment verification failed. Please contact support.');
        } catch (\Exception $e) {
            Log::error('Stripe Success Handler Exception: ' . $e->getMessage());
            return redirect()->route('agent.payment.show')
                ->with('error', 'An error occurred while processing your payment. Please check your orders or contact support.');
        }
    }
    public function cancel()
    {
        $messages = $this->stripePaymentService->cancelPaymentOrder();
        return redirect()->route('agent.payment.show')->with('error',  $messages);
    }
}
