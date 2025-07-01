<?php

namespace App\Http\Controllers\Admin\dashboard\Properties;

use App\Http\Controllers\Controller;
use App\Services\Properties\Property\PropertyServices;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function __construct(protected PropertyServices $propertyServices) {}
    public function ShowAllProperties()
    {
        $properties = $this->propertyServices->fetchAllProperties();
        return view('admin.dashboard.properties.index', compact('properties'));
    }
    public function ShowProperty($id)
    {
        $property = $this->propertyServices->fetchPropertyById($id);
        return view('admin.dashboard.properties.show', compact('property'));
    }
    public function updateState(string $id)
    {
        if ($this->propertyServices->fetchPropertyById($id)->is_active == 1) {
            $data = ['is_active' => '0'];
        } else {
            $data = ['is_active' => '1'];
        }
        $is_update = $this->propertyServices->updateProperty($id, $data);
        if (!$is_update) {
            return redirect()->back()->with('error', 'Property Not Updated ');
        }
        return redirect()->back()->with('success', 'Property Updated Successfully');
    }
}
