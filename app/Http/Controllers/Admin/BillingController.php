<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\User;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Billings";
        $billing = Billing::paginate(10);
        return view('admin.billing.list',compact('title','billing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Billing";
        $users=User::all();
        return view('admin.billing.add',compact('title','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated=$request->validate([
        //     'eventName'=>'required',
        //     'startDate'=>'required',
        //     'endDate'=>'required',
        //     'location'=>'required',
        //     'committeeId'=>'required'
        // ]);

        $billing = new Billing;
        $billing->create($request->all());
        return redirect('/admin/billing')->with('success','Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="View billing";
        $billing=Billing::find($id);
        $users=User::all();
        return view('admin.billing.detail',compact('title','billing','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $title="Edit billing";
        $billing=Billing::find($id);
        
        $users=User::all();
        return view('admin.billing.edit',compact('title','billing','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        // $validated=$request->validate([
        //     'eventName'=>'required',
        //     'startDate'=>'required',
        //     'endDate'=>'required',
        //     'location'=>'required',
        //     'committeeId'=>'required'
        // ]);

        $billing = Billing::find($id);
        $billing->update($request->all());
        return redirect('/admin/billing')->with('success','Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $billing=Billing::find($id);
        $billing->delete();
        return redirect('/admin/billing')->with('success','Operation Successfull');
    }
}
