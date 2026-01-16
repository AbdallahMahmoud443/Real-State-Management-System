<?php

namespace App\Http\Controllers\Admin\dashboard\orders;

use App\Http\Controllers\Controller;
use App\Services\Invoices\InvoiceService;
use App\Services\Orders\OrderServices;


class OrderController extends Controller
{
    //
    public function __construct(protected OrderServices $orderServices, protected InvoiceService $invoiceService) {}
    public function index()
    {
        // Logic to retrieve and display orders
        $orders = $this->orderServices->fetchAllOrders();
        return view('admin.dashboard.orders.index', compact('orders'));
    }
    public function printInvoice(int $order_id)
    {
        $order = $this->orderServices->fetchOneOrder($order_id);
        return $this->invoiceService->printInvoiceAsPDF($order);
    }
}
