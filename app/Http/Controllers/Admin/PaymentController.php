<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Payments";
        $query = Payment::orderBy('id', 'DESC');

        if (request()->has('search')) {
            $search = request()->input('search');
            $columns = \Schema::getColumnListing((new Payment())->getTable());

            $query->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }



                // Add conditions to search in the related User model
                $subquery->orWhereHas('users', function ($userQuery) use ($search) {
                    $userQuery->where('fistName', 'LIKE', '%' . $search . '%')
                        ->orWhere('lastName', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
            });
        }

        $payments = $query->paginate(10);

        return view('admin.payments.list', compact('title', 'payments'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $title = "Payment";
        $payment = Payment::find($id);

        return view('admin.payments.detail', compact('title', 'payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Update Payment Status";
        $payment = Payment::find($id);

        return view('admin.payments.edit', compact('title', 'payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment = Payment::find($id);
        $transaction = Transaction::find($payment->transactionId);

        if ($request->status === 'Paid') {
            $transaction->update([
                'status' => 'Paid'
            ]);
        }

        $admin_reciept = null;
        if ($request->file('admin_reciept')) {
            $fileName = time() . '_' . $request->file('admin_reciept')->getClientOriginalName();
            $filePath = $request->file('admin_reciept')->store('uploads/admin_reciept', 'public');

            $admin_reciept = "/" . $filePath;
        }

        $payment->update([
            'status' => $request->status,
            'admin_reciept' => $admin_reciept
        ]);

        return redirect('/admin/payments')->with('success', 'Payment Status Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
