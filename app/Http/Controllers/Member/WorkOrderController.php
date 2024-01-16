<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\WorkOrder;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = "Work Order";
        $workOrderQuery = WorkOrder::where('requestedBy', auth()->user()->id);

        if ($request->has('search')) {
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
            $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date[0])->startOfDay();
            $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date[1])->endOfDay();

            $workOrderQuery->whereBetween('requested_date', [$startDate, $endDate]);
        }

        $workOrder = $workOrderQuery->paginate(10);

        return view('member.work-order.index', compact('title', 'workOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Work Order Request";
        $vendor = Vendor::all();
        $property = Properties::all();
        $members = User::all();
        return view('member.work-order.work-request', compact('title', 'vendor', 'property', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['requested_date'] = date('Y-m-d H:i:s');
        $request['requestedBy'] = auth()->user()->id;
        $request['status'] = "Customer-Requested";
        WorkOrder::create($request->all());

        return redirect('/work-order')->with('success', 'Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $title = "View Work Order";
        $workOrder = WorkOrder::find($id);

        $vendor = Vendor::all();
        $properties = Properties::all();
        $members = User::all();
        return view('member.work-order.details', compact('title', 'workOrder', 'properties', 'members', 'vendor'));
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
