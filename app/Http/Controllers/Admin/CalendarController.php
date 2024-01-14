<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Committee;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Event";
        $query = Calendar::query();

        if (request()->has('search')) {
            $search = request()->input('search');
            $columns = \Schema::getColumnListing((new Calendar())->getTable());

            $query->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }

                $subquery->orWhereHas('committees', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
            });
        }

        $calendar = $query->paginate(10);

        return view('admin.calendar.list', compact('title', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Event";
        $committee = Committee::all();
        return view('admin.calendar.add', compact('title', 'committee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'eventName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'location' => 'required',
            'committeeId' => 'required'
        ]);

        $calendar = new Calendar;
        $calendar->create($request->all());
        return redirect('/admin/calendar')->with('success', 'Operation Successfull');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "View Event";
        $calendar = Calendar::find($id);
        $committee = Committee::find($calendar->committeeId);
        return view('admin.calendar.detail', compact('title', 'calendar', 'committee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Event";
        $calendar = Calendar::find($id);

        $committee = Committee::all();
        return view('admin.calendar.edit', compact('title', 'calendar', 'committee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'eventName' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'location' => 'required',
            'committeeId' => 'required'
        ]);

        $calendar = Calendar::find($id);
        $calendar->update($request->all());
        return redirect('/admin/calendar')->with('success', 'Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Calendar::find($id);
        $product->delete();
        return redirect('/admin/calendar')->with('success', 'Operation Successfull');
    }
}
