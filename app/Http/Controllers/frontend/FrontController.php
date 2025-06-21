<?php

namespace App\Http\controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Properties\Locations\LocationService;
use App\Services\PricingPackages\PricingPackagesService;

class FrontController extends Controller
{
    //
    public function __construct(protected PricingPackagesService $pricingPackagesService, protected LocationService $locationService) {}
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
    public function location()
    {
        $locations = $this->locationService->fetchLocations();
        return view('frontend.pages.location', compact('locations'));
    }
}
