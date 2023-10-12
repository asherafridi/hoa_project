<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Members";
        $boardmember = User::paginate(10);
        return view('admin.member.list',compact('title','boardmember'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Member";
        $properties=Properties::get();
        $type=UserType::get();
        return view('admin.member.add',compact('title','properties','type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' =>'required',
            'lastName' =>'required',
            'phone' =>'required',
            'userType' =>'required',
            'propertyId' =>'required',
            'email' =>'required|email',
            'password' => 'required',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('admin.member.index')->with('success','Member Added Successfully');
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
        
        $title="Edit Member";
        $member=User::find($id);
        $properties=Properties::get();
        $types=UserType::get();
        return view('admin.member.edit',compact('title','member','properties','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'userType' => 'required',
            'propertyId' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Find the user to update by their ID
        $user = User::findOrFail($id);
    
        // Update the user's data
        $user->update([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'phone' => $request->input('phone'),
            'userType' => $request->input('userType'),
            'propertyId' => $request->input('propertyId'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    
        return redirect()->route('admin.member.index')->with('success', 'Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $boardmember=User::find($id);
        $boardmember->delete();
        
        return redirect()->route('admin.member.index')->with('success', 'Member Deleted Successfully');
    }
}