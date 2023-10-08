<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorType;
use Illuminate\Http\Request;

class VendorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title="Vendor Type";
        $vendorType = VendorType::paginate(10);
        return view('admin.vendor-type.list',compact('title','vendorType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $title="Add Vendor Type";
        return view('admin.vendor-type.add',compact('title'));
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
        VendorType::create($data);
        return redirect()->route('admin.vendor-type.index')->with('success','Vendor Type Added Successfully');
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
        $title="Vendor Type";
        $vendorType=VendorType::find($id);
        return view('admin.vendor-type.edit',compact('title','vendorType'));
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

    // Find the VendorType record you want to update
    $VendorType = VendorType::findOrFail($id);

    // Update the record with the new data
    $VendorType->update([
        'name' => $request->input('name'),
        // Add more fields to update as needed
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('admin.vendor-type.index')->with('success', 'Vendor Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    // Find the VendorType record you want to "soft" delete
    $VendorType = VendorType::findOrFail($id);

    // Soft delete the record
    $VendorType->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('admin.vendor-type.index')->with('success', 'Vendor Type Deleted Successfully');
    }
}
