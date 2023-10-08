<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserType;
use Illuminate\Http\Request;

class MemberTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title="Members Type";
        $memberType = UserType::paginate(10);
        return view('admin.member-type.list',compact('title','memberType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $title="Add Member Type";
        return view('admin.member-type.add',compact('title'));
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
        UserType::create($data);
        return redirect()->route('admin.member-type.index')->with('success','Member Type Added Successfully');
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
        $title="Member Type";
        $memberType=UserType::find($id);
        return view('admin.member-type.edit',compact('title','memberType'));
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

    // Find the UserType record you want to update
    $userType = UserType::findOrFail($id);

    // Update the record with the new data
    $userType->update([
        'name' => $request->input('name'),
        // Add more fields to update as needed
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('admin.member-type.index')->with('success', 'Member Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    // Find the UserType record you want to "soft" delete
    $userType = UserType::findOrFail($id);

    // Soft delete the record
    $userType->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('admin.member-type.index')->with('success', 'Member Type Deleted Successfully');
    }
}
