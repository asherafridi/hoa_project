<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title="Property Type";
        $propertyType = PropertyType::paginate(10);
        return view('admin.property-type.list',compact('title','propertyType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $title="Add Property Type";
        return view('admin.property-type.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' =>'required'
        ]);
        $data = $request->all();
        PropertyType::create($data);
        return redirect()->route('admin.property-type.index')->with('success','Property Type Added Successfully');
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
        $title="Property Type";
        $propertyType=PropertyType::find($id);
        return view('admin.property-type.edit',compact('title','propertyType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    // Validate the incoming data
    $request->validate([
        'name' => 'required',
    ]);

    // Find the PropertyType record you want to update
    $PropertyType = PropertyType::findOrFail($id);

    // Update the record with the new data
    $PropertyType->update([
        'name' => $request->input('name'),
        // Add more fields to update as needed
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('admin.property-type.index')->with('success', 'Property Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    // Find the PropertyType record you want to "soft" delete
    $PropertyType = PropertyType::findOrFail($id);

    // Soft delete the record
    $PropertyType->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('admin.property-type.index')->with('success', 'Property Type Deleted Successfully');
    }
}
