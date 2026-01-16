<?php

namespace App\Http\Controllers\Agent\Invoice;

use App\Http\Controllers\Controller;
use App\Services\Invoices\InvoiceService;
use App\Services\Orders\OrderServices;



class InvoiceController extends Controller
{
    public function __construct(protected InvoiceService $invoiceService, protected OrderServices $orderService) {}
    public function printInvoice(int $order_id)
    {
        $order = $this->orderService->fetchOneOrder($order_id);
        return $this->invoiceService->printInvoiceAsPDF($order);
    }
}
