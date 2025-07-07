<?php

namespace App\Http\controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Services\Properties\Locations\LocationService;
use App\Services\PricingPackages\PricingPackagesService;
use App\Services\Properties\Property\PropertyServices;
use App\Services\Users\Agents\AgentServices;

class FrontController extends Controller
{
    //
    public function __construct(
        protected PricingPackagesService $pricingPackagesService,
        protected LocationService $locationService,
        protected PropertyServices $propertyServices,
        protected AgentServices $agentServices,

    ) {}
    public function index()
    {
        $properties = $this->propertyServices->fetchSomeOfProperties(6);
        $locations = $this->locationService->fetchSomeLocations(8);
        $agents  = $this->agentServices->fetchSomeAgent(4);
        return view('frontend.pages.home', compact('properties', 'locations', 'agents'));
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
        // hint: write code to get number of properties in each location
        $locations = $this->locationService->fetchLocationsWithPropertiesCount();
        return view('frontend.pages.location', compact('locations'));
    }
    public function propertiesByLocation(string $slug)
    {
        $location = $this->locationService->fetchLocationBySlug($slug);
        $properties = $this->propertyServices->fetchRelatedPropertiesByLocation($location->id, 3);
        return view('frontend.pages.properties_location', compact('location', 'properties'));
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
    public function agents()
    {
        $agents = $this->agentServices->fetchAllAgentsWithPaginate(4);
        return view('frontend.pages.agents', compact('agents'));
    }
    public function agentsDetails(int $id)
    {
        $agent = $this->agentServices->fetchAgentById($id);
        $properties = $this->propertyServices->fetchPropertiesByAgentId($id);

        return view('frontend.pages.agent_details', compact('agent', 'properties'));
    }
}
