<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = "Payment History";
        $paymentQuery = Payment::query();

        $paymentQuery->where('vendorId', auth()->guard('vendor')->user()->id);

        if ($request->has('search')) {
            $search = $request->input('search');
            $columns = \Schema::getColumnListing((new Payment())->getTable());

            $paymentQuery->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }

                // Add conditions to search in the related User model
                $subquery->orWhereHas('transactions', function ($userQuery) use ($search) {
                    $userQuery->where('description', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
            });
        }

        if ($request->status !== null) {
            $paymentQuery->where('status', $request->status);
        }

        $payment = $paymentQuery->paginate(10);

        return view('vendor.payments.index', compact('title', 'payment'));
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
