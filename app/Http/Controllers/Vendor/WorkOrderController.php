<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = "Work Order";
        $workOrderQuery = WorkOrder::where('assignedTo', auth()->guard('vendor')->user()->id);


        if ($request->search !== null) {
            $search = $request->input('search');
            $columns = \Schema::getColumnListing((new WorkOrder())->getTable());

            $workOrderQuery->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }

                $subquery->orWhereHas('properties', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
                $subquery->orWhereHas('users', function ($userQuery) use ($search) {
                    $userQuery->where('firstName', 'LIKE', '%' . $search . '%')
                        ->orWhere('lastName', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });

                $subquery->orWhereHas('vendors', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
            });

        }

        if ($request->priority !== null) {
            $workOrderQuery->where('priority', $request->priority);
        }
        if ($request->status !== null) {
            $workOrderQuery->where('status', $request->status);
        }
        if ($request->date !== null) {
            $date = explode(' to ', $request->date);
            if (count($date) == 2) {
    // Date range selection
    $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date[0])->startOfDay();
    $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date[1])->endOfDay();

    $workOrderQuery->whereBetween('requested_date', [$startDate, $endDate]);
} else {
    // Single date selection
    $selectedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date[0])->startOfDay();
    $workOrderQuery->whereDate('requested_date', $selectedDate);
}
        }

        $workOrder = $workOrderQuery->paginate(10);

        return view('vendor.work-order.index', compact('title', 'workOrder'));
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

        $title = "Update Work Order Status";
        $workOrder = WorkOrder::find($id);

        $vendor = Vendor::all();
        $properties = Properties::all();
        $members = User::all();
        return view('vendor.work-order.edit', compact('title', 'workOrder', 'properties', 'members', 'vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $workOrder = WorkOrder::findOrFail($id);


        $workOrder->update($request->all());

        return redirect('/vendor/work-order')->with('success', 'Operation successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
