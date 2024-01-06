<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Events";
        $calendarQuery = Calendar::query();
        $calendarQuery->whereIn('forUser', ['Vendors Only', 'Both']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $columns = \Schema::getColumnListing((new Calendar())->getTable());

            $calendarQuery->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        $calendar = $calendarQuery->paginate(10);

        return view('vendor.calendar.list', compact('title', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
