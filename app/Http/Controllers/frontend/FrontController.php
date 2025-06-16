<?php

namespace App\Http\controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PricingPackages\PricingPackagesService;

class FrontController extends Controller
{
    //
    public function __construct(protected PricingPackagesService $pricingPackagesService) {}
    public function index()
    {
        return view('frontend.pages.home');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function pricing()
    {
        $pricingPackages = $this->pricingPackagesService->fetchALLPackages();
        return view('frontend.pages.pricing', compact('pricingPackages'));
    }
}
