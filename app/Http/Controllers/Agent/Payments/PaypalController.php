<?php

namespace App\Http\Controllers\Agent\Payments;

use App\Http\Controllers\Controller;
use App\Services\Payments\PaymentMail\PaymentMailService;
use App\Services\Payments\PaypalPaymentService;
use App\Services\PricingPackages\PricingPackagesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    function __construct(protected PaypalPaymentService $paypalPaymentService, protected PricingPackagesService $pricingPackagesService, protected PaymentMailService $paymentMailService) {}
    public function paypal(Request $request)
    {
        try {
            $package_id = $request->only('package_id');
            if (empty($package_id['package_id'])) {
                return redirect()->back()->with('error', 'Please select a package');
            }
            $pricingPackage = $this->pricingPackagesService->fetchOnePackage($package_id['package_id']);
            return $this->paypalPaymentService->createOrderWithPaymentGateWay($pricingPackage);
        } catch (\Exception $e) {
            Log::error('PayPal Controller Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your payment. Please try again.');
        }
    }
    public function success(Request $request)
    {
        $newOrder = $this->paypalPaymentService->successPaymentOrder($request);
        if ($newOrder instanceof \App\Models\Order) {
            $this->paymentMailService->sendPaymentMailToAgent($newOrder);

            return redirect()->route('agent.payment.show')->with('success', 'Payment Process Completed');
        }
        return redirect()->route('agent.paypal.cancel')->with('error', 'Payment processing failed. Please try again.');
    }
    public function cancel()
    {
        $messages = $this->paypalPaymentService->cancelPaymentOrder();
        return redirect()->route('agent.payment.show')->with('error',  $messages);
    }
}
