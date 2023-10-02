<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WordOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Work Order";
        $workOrder = WorkOrder::paginate(10);
        return view('admin.work-order.list',compact('title','workOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Work Order";
        $vendor=Vendor::all();
        return view('admin.work-order.add',compact('title','vendor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $workOrder = new WorkOrder;
        $request['adminId']=auth()->guard('admin')->user()->id;
        $workOrder->create($request->all());
        return redirect('/admin/work-order')->with('success','Operation Successfull');
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
        $title="Edit Work Order";
        $workOrder=WorkOrder::find($id);
        
        $vendor=Vendor::all();
        return view('admin.work-order.edit',compact('title','workOrder','vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $workOrder = WorkOrder::find($id);
        $workOrder->update($request->all());
        return redirect('/admin/work-order')->with('success','Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workOrder=WorkOrder::find($id);
        $workOrder->delete();
        return redirect('/admin/work-order')->with('success','Operation Successfull');
    }
}
