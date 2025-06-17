<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Services\Types\TypeServices;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct(protected TypeServices $typeServices) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = $this->typeServices->fetchTypes();
        return view('admin.dashboard.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|unique:types,name'
        ]);
        $validated_data = $request->only('name');
        $type = $this->typeServices->createType($validated_data);
        if (!$type) return redirect()->route('admin.type.index')->with('error', 'Type created Failed');
        return redirect()->route('admin.type.index')->with('success', 'Type created Successfully');
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
        $type = $this->typeServices->fetchOneType($id);
        return view('admin.dashboard.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|unique:types,name,' . $id
        ]);
        $validated_data = $request->only('name');
        $type = $this->typeServices->updateType($id, $validated_data);
        if (!$type) return redirect()->route('admin.type.index')->with('error', 'Type Updated Failed');
        return redirect()->route('admin.type.index')->with('success', 'Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $type = $this->typeServices->deleteType($id);
        if (!$type) return redirect()->route('admin.type.index')->with('error', 'Type Deleted Failed');
        return redirect()->route('admin.type.index')->with('success', 'Type Deleted Successfully');
    }
}
