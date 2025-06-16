<?php

namespace App\Http\Controllers\Admin\pricingPackages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PricingPackages\PricingPackagesService;

class PricingPackagesController extends Controller
{
    public function __construct(protected PricingPackagesService $pricingPackagesService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricingPackages = $this->pricingPackagesService->fetchALLPackages();
        return view('admin.dashboard.pricing_packages.index', compact('pricingPackages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.dashboard.pricing_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'numeric',
            'allowed_days' => 'numeric|max:60',
            'allowed_properties' => 'required|integer|min:-1|max:15',
            'allowed_features' => 'required|integer|min:-1|max:15',
            'allowed_photos' => 'required|integer|min:0|max:15',
            'allowed_videos' => 'required|integer|min:0|max:15',
        ]);
        $newPackage = $this->pricingPackagesService->createPackage($request->all());
        if (!$newPackage)  return redirect()->route('admin.package.show')->with('error', 'Pricing Package Created Failed');
        return redirect()->route('admin.package.show')->with('success', 'Pricing Package Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pricingPackage = $this->pricingPackagesService->fetchOnePackage($id);
        return view('admin.dashboard.pricing_packages.edit', compact('pricingPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'numeric',
            'allowed_days' => 'numeric|max:60',
            'allowed_properties' => 'integer|min:-1|max:15',
            'allowed_features' => 'integer|min:-1|max:15',
            'allowed_photos' => 'integer|min:0|max:15',
            'allowed_videos' => 'integer|min:0|max:15',
        ]);
        $result = $this->pricingPackagesService->updatePackage($id, $request->all());
        if (!$result) return redirect()->route('admin.package.show')->with('error', 'Pricing Package Updated Failed');
        return redirect()->route('admin.package.show')->with('success', 'Pricing Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $result = $this->pricingPackagesService->deletePackage($id);
        if (!$result) redirect()->route('admin.package.show')->with('error', 'Pricing Package Deleted Failed');
        return redirect()->route('admin.package.show')->with('success', 'Pricing Package Deleted Successfully');
    }
}
