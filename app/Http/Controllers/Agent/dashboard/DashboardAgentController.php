<?php

namespace App\Http\Controllers\agent\dashboard;

use App\Http\Controllers\Controller;
use App\Services\Orders\OrderServices;
use App\Services\PricingPackages\PricingPackagesService;
use Illuminate\Support\Facades\Auth;


class DashboardAgentController extends Controller
{
    public function __construct(protected PricingPackagesService $pricingPackagesService, protected OrderServices $orderServices) {}
    //
    function index()
    {
        return view('agent.dashboard.index');
    }
    function payment()
    {
        $activeOrder = $this->orderServices->FetchActiveOrderByAgentId(Auth::guard('agent')->user()->id);
        $packages =  $this->pricingPackagesService->fetchALLPackages();
        return view('agent.dashboard.payment', compact('packages', 'activeOrder'));
    }
    function orders()
    {
        $orders = $this->orderServices->fetchOrdersByAgentId(Auth::guard('agent')->user()->id);
        return view('agent.dashboard.orders', compact('orders'));
    }
}
