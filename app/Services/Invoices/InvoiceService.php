<?php

namespace App\Services\Invoices;

use App\Models\Order;
use App\Services\Invoices\contracts\InvoiceContract;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class InvoiceService implements InvoiceContract
{
    public function printInvoiceAsPDF(Order $order): Response
    {
        $orderData = [
            'agent_name' => $order->agent->name,
            'order_id' => 'INV-' . $order->id,
            'transaction_id' => $order->transaction_id,
            'payment_method' => $order->payment_method,
            'purchase_date' => $order->purchase_date,
            'expire_date' => $order->expire_date,
            'package_name' => $order->package->name,
            'status' => $order->status,
            'paid_amount' => $order->paid_amount,
        ];
        $pdf = Pdf::loadView('agent.invoices.order_invoice', compact('orderData'));
        return $pdf->download($orderData['agent_name'] . '-invoice.pdf');
    }
}
