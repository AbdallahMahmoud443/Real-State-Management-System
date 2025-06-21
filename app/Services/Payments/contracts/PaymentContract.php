<?php

namespace App\Services\Payments\contracts;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


interface PaymentContract
{
    /**
     * Create order with payment method
     * @param \Illuminate\Database\Eloquent\Model
     * @return RedirectResponse
     */
    public function createOrderWithPaymentGateWay($pricingPackage): RedirectResponse;

    /**
     * create order in database after complete payment method
     * @param Request $request
     * @return mixed
     */
    public function successPaymentOrder(Request $request);

    /**
     * cancel payment process when payment process not completed
     *
     * @return void
     */
    public function cancelPaymentOrder();
}
