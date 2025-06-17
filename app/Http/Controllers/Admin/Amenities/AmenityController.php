<?php

namespace App\Http\Controllers\Admin\Amenities;

use App\Http\Controllers\Controller;
use App\Services\Amenities\AmenityServices;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function __construct(protected AmenityServices $amenityServices) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = $this->amenityServices->fetchAmenities();
        return view('admin.dashboard.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required||string|unique:amenities,name'
        ]);
        $validated_data = $request->only('name');
        $amenity = $this->amenityServices->createAmenity($validated_data);
        if (!$amenity) return redirect()->route('admin.amenity.index')->with('error', 'Amenity created Failed');
        return redirect()->route('admin.amenity.index')->with('success', 'Amenity created Successfully');
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
        $amenity = $this->amenityServices->fetchOneAmenity($id);
        return view('admin.dashboard.amenities.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|unique:amenities,name,' . $id
        ]);
        $validated_data = $request->only('name');
        $amenity = $this->amenityServices->updateAmenity($id, $validated_data);
        if (!$amenity) return redirect()->route('admin.amenity.index')->with('error', 'Amenity Updated Failed');
        return redirect()->route('admin.amenity.index')->with('success', 'Amenity Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $amenity = $this->amenityServices->deleteAmenity($id);
        if (!$amenity) return redirect()->route('admin.amenity.index')->with('error', 'Amenity Deleted Failed');
        return redirect()->route('admin.amenity.index')->with('success', 'Amenity Deleted Successfully');
    }
}
