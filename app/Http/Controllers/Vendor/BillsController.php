<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = "Bills";
        $transactionsQuery = Transaction::where('vendorId', auth()->guard('vendor')->user()->id);

        if ($request->has('search')) {
            $search = $request->input('search');
            $columns = \Schema::getColumnListing((new Transaction())->getTable());

            $transactionsQuery->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }

                // Add conditions to search in the related User model

                // Add conditions to search in the related User model
                $subquery->orWhereHas('vendors', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });

                // Add conditions to search in the related User model
                $subquery->orWhereHas('types', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                });
            });
        }

        if ($request->status !== null) {
            $transactionsQuery->where('status', $request->status);
        }

        $transactions = $transactionsQuery->paginate(10);

        return view('vendor.bills.index', compact('title', 'transactions'));

    }


    public function payBill(string $id)
    {
        $title = "Pay Bill";
        $bill = Transaction::find($id);
        return view('vendor.bills.pay-bill', compact('bill', 'title'));
    }
    public function manualBillPay(Request $request)
    {

        $bill = Transaction::find($request->transactionId);
        if ($bill->payment()) {

            return redirect('/bill')->with('error', 'Transaction already in process');
        }

        if ($request->hasFile('referencePic')) {
            $file = $request->file('referencePic');
            $filename = $file->store('uploads/referencePic', 'public');
            $request['screenshot'] = $filename;
            // Now, $filename contains the path or filename of the stored file.
        }
        $request['paymentDate'] = date('Y-m-d');
        $request['amount'] = $bill->amount;
        $request['status'] = "Pending";
        Payment::create($request->all());

        return redirect('vendor/bills')->with('error', 'Wait for Admin Approval');
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
