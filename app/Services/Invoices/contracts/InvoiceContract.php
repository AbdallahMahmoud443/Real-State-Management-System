<?php

namespace App\Services\Invoices\contracts;

use App\Models\Order;
use Illuminate\Http\Response;

interface InvoiceContract
{
    /**
     * Print and download invoice of order to agent
     * @param Order $order
     */
    public function printInvoiceAsPDF(Order $order):Response;
}
