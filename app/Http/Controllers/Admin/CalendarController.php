<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Calendar";
        $calendar = Calendar::paginate(2);
        return view('admin.calendar.list',compact('title','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Calendar";
        return view('admin.calendar.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'eventName'=>'required',
            'startDate'=>'required',
            'endDate'=>'required',
            'location'=>'required',
            'committeeId'=>'required'
        ]);

        $calendar = new Calendar;
        $calendar->create($request->all());
        return redirect('/admin/calendar')->with('success','Operation Successfull');

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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
