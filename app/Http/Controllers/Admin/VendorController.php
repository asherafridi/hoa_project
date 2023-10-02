<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Vendor";
        $vendor = Vendor::paginate(10);
        return view('admin.vendor.list',compact('title','vendor'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Vendor";
        return view('admin.vendor.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'contactPerson'=>'required',
            'contactNumber'=>'required',
            'serviceDescription'=>'required',
        ]);
        $request['adminId']=auth()->guard('admin')->user()->id;
        $vendor = new Vendor;
        $vendor->create($request->all());
        return redirect('/admin/vendor')->with('success','Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $title="View Vendor";
        $vendor=Vendor::find($id);
        return view('admin.vendor.detail',compact('title','vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title="Edit Vendor";
        $vendor=Vendor::find($id);
        return view('admin.vendor.edit',compact('title','vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validated=$request->validate([
            'name'=>'required',
            'contactPerson'=>'required',
            'contactNumber'=>'required',
            'serviceDescription'=>'required',
        ]);

        $vendor = Vendor::find($id);
        $vendor->update($request->all());
        return redirect('/admin/vendor')->with('success','Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $vendor=Vendor::find($id);
        $vendor->delete();
        return redirect('/admin/vendor')->with('success','Operation Successfull');
    }
}
