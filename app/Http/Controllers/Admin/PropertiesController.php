<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\User;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Properties";
        $properties = Properties::paginate(10);
        return view('admin.properties.list',compact('title','properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Properties";
        $users=User::all();
        return view('admin.properties.add',compact('title','users'));
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

        $properties = new Properties;
        $properties->create($request->all());
        return redirect('/admin/properties')->with('success','Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="View Properties";
        $properties=Properties::find($id);
        $users=User::all();
        return view('admin.properties.detail',compact('title','properties','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $title="Edit Properties";
        $properties=Properties::find($id);
        
        $users=User::all();
        return view('admin.properties.edit',compact('title','properties','users'));
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

        $properties = Properties::find($id);
        $properties->update($request->all());
        return redirect('/admin/properties')->with('success','Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properties=Properties::find($id);
        $properties->delete();
        return redirect('/admin/properties')->with('success','Operation Successfull');
    }
}
