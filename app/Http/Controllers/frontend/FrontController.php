<?php

namespace App\Http\controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Properties\Locations\LocationService;
use App\Services\PricingPackages\PricingPackagesService;
use App\Services\Properties\Property\PropertyServices;


class FrontController extends Controller
{
    //
    public function __construct(
        protected PricingPackagesService $pricingPackagesService,
        protected LocationService $locationService,
        protected PropertyServices $propertyServices,

    ) {}
    public function index()
    {
        $properties = $this->propertyServices->fetchSomeOfProperties(6);
        return view('frontend.pages.home', compact('properties'));
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

    public function propertyDetails(string $slug)
    {
        $property = $this->propertyServices->fetchPropertyBySlug($slug);
    
        $relatedProperties = $this->propertyServices->fetchRelatedPropertiesByType($property->types->id, $property->slug, 2);

        return view('frontend.pages.property-details', compact('property', 'relatedProperties'));
    }
    public function enquiryFormHandle(Request $request, string $slug)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string|max:500',
        ]);

        $is_sending = $this->propertyServices->sendEnquiryMail($request->all(), $slug);
        if (!$is_sending) return redirect()->back()->with('error', 'Something went wrong!');
        return redirect()->back()->with('success', 'send message successfully!');
    }
}
