<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WordOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Work Order";
        $workOrderQuery = WorkOrder::query();

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

        return view('admin.work-order.list', compact('title', 'workOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Work Order";
        $vendor = Vendor::all();
        $property = Properties::all();
        $members = User::all();
        return view('admin.work-order.add', compact('title', 'vendor', 'property', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice' => 'file|mimes:pdf,docx|max:2048',
        ]);
        $workOrder = new WorkOrder;
        if ($request->hasFile('invoice1')) {
            $file = $request->file('invoice1');
            if ($file->isValid()) {

                $originalFilename = $file->getClientOriginalName(); // Get the original filename.
                $filename = $file->storeAs('uploads/documents', $originalFilename, 'public');
                $request->merge(['invoice' => $filename]);
            } else {
                return redirect()->back()->with('error', 'Failed to upload the invoice file.');
            }
        }
        $workOrder->create($request->all());
        return redirect('/admin/work-order')->with('success', 'Work Order Added Successfull');
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
        return view('admin.work-order.detail', compact('title', 'workOrder', 'properties', 'members', 'vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Work Order";
        $workOrder = WorkOrder::find($id);

        $vendor = Vendor::all();
        $properties = Properties::all();
        $members = User::all();
        return view('admin.work-order.edit', compact('title', 'workOrder', 'properties', 'members', 'vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $workOrder = WorkOrder::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('invoice1')) {
            $file = $request->file('invoice1');
            if ($file->isValid()) {
                // Delete the old invoice file if it exists
                if ($workOrder->invoice) {
                    Storage::delete($workOrder->invoice);
                }

                $originalFilename = $file->getClientOriginalName(); // Get the original filename.
                $filename = $file->storeAs('uploads/documents', $originalFilename, 'public');
                $request->merge(['invoice' => $filename]);
            } else {
                return redirect()->back()->with('error', 'Failed to upload the new invoice file.');
            }
        }

        $workOrder->update($request->all());

        return redirect('/admin/work-order')->with('success', 'Work Order Updated successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workOrder = WorkOrder::find($id);
        $workOrder->delete();
        return redirect('/admin/work-order')->with('success', 'Work Order Removed Successfull');
    }
}
