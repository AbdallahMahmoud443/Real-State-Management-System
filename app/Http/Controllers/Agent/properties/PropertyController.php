<?php

namespace App\Http\Controllers\Agent\properties;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Services\Properties\Amenities\AmenityServices;

use App\Services\Properties\Locations\LocationService;
use App\Services\Properties\Property\PropertyServices;
use App\Services\Properties\Types\TypeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{
    public function __construct(
        protected LocationService $locationService,
        protected TypeServices $typeServices,
        protected AmenityServices $amenityServices,
        protected PropertyServices $propertyServices
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = $this->propertyServices->fetchPropertiesByAgentId(Auth::guard('agent')->user()->id);
        return view('agent.dashboard.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $locations = $this->locationService->fetchLocations();
        $types = $this->typeServices->fetchTypes();
        $amenities = $this->amenityServices->fetchAmenities();
        return view('agent.dashboard.property.create', compact('locations', 'types', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:properties,slug',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'cover' => 'nullable|image|mimetypes:image/*',
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'size' => 'required|numeric|min:0', // hint: e.g., in square feet/meters
            'floor' => 'required|integer|min:0',
            'garage' => 'nullable|integer|min:0',
            'balcony' => 'nullable|integer|min:0',
            'status' => 'required|in:rent,sale',
            'is_featured' => 'nullable|string|in:1,0',
            'address' => 'required|string',
            'built_year' => 'nullable|date|before_or_equal:today',
            'location_map' => 'nullable|url',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id', // hint: Validate each amenity in the array
        ]);
        $validated_data = $request->all();
        $property = $this->propertyServices->createProperty($validated_data);
        if (!$property instanceof Property) {
            return redirect()->route('agent.properties.index')->with('error', 'Creating Property Failed');
        }
        return redirect()->route('agent.properties.index')->with('success', 'Property created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locations = $this->locationService->fetchLocations();
        $types = $this->typeServices->fetchTypes();
        $amenities = $this->amenityServices->fetchAmenities();
        $property = $this->propertyServices->fetchPropertyById($id);
        $property_amenities = $this->propertyServices->fetchAmenitiesOfProperty($property);
        return view('agent.dashboard.property.edit', compact('locations', 'types', 'amenities', 'property', 'property_amenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:properties,slug,' . $id,
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'cover' => 'nullable|image|mimetypes:image/*',
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'size' => 'required|numeric|min:0', // hint: e.g., in square feet/meters
            'floor' => 'required|integer|min:0',
            'garage' => 'nullable|integer|min:0',
            'balcony' => 'nullable|integer|min:0',
            'status' => 'required|in:rent,sale',
            'is_featured' => 'nullable|string|in:1,0',
            'address' => 'required|string',
            'built_year' => 'nullable|date|before_or_equal:today',
            'location_map' => 'nullable|url',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id', // hint: Validate each amenity in the array
        ]);
        $property = $this->propertyServices->updateProperty($id, $request->all());
        if (!$property instanceof Property) {
            return redirect()->route('agent.properties.index')->with('error', 'Updating Property Failed');
        }
        return redirect()->route('agent.properties.index')->with('success', ' Property Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $is_deleted = $this->propertyServices->deleteProperty($id);
        if (!$is_deleted) {
            return redirect()->route('agent.properties.index')->with('error', 'Deleting Property Failed');
        }
        return redirect()->route('agent.properties.index')->with('success', 'Property deleted successfully');
    }
}
