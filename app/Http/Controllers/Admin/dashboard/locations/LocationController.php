<?php

namespace App\Http\Controllers\Admin\dashboard\locations;

use App\Http\Controllers\Controller;
use App\Services\Properties\Locations\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct(protected LocationService $locationService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = $this->locationService->fetchLocations();
        return view('admin.dashboard.locations.index', compact('locations'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.dashboard.locations.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|unique:locations,name',
            'slug' => 'required|string|unique:locations,slug|regex:^[a-z0-9\-]+$',
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:5120',
        ]);
        $location = $this->locationService->createLocation($request->all());
        if (!$location)  return redirect()->route('admin.location.index')->with('error', 'Location created Failed');
        return redirect()->route('admin.location.index')->with('success', 'Location created successfully');
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
        //
        $location = $this->locationService->fetchOneLocation($id);
        return view('admin.dashboard.locations.edit', compact('location'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|unique:locations,name,' . $id,
            'slug' => 'required|string|regex:/^[a-z0-9\-]+$/|unique:locations,slug,' . $id,
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:5120',
        ]);
        $validated_data = $request->only('name', 'slug');
        if ($request->hasFile('photo')) {
            $this->locationService->updateImageLocation($request->file('photo'), $id);
        }
        $location = $this->locationService->updateLocation($id, $validated_data);
        if (!$location)  return redirect()->route('admin.location.index')->with('error', 'Location updated Failed');
        return redirect()->route('admin.location.index')->with('success', 'Location updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = $this->locationService->deleteLocation($id);
        if (!$location)  return redirect()->route('admin.location.index')->with('error', 'Location deleted Failed');
        return redirect()->route('admin.location.index')->with('success', 'Location deleted successfully');
    }
}
