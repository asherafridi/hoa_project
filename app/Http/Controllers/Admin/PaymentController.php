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
    public function index()
    {
        
        $title="Payments";
        $payments = Payment::orderBy('id','DESC')->paginate(10);
        return view('admin.payments.list',compact('title','payments'));
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
        
        $title="Payment";
        $payment=Payment::find($id);
        
        return view('admin.payments.detail',compact('title','payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Update Payment Status";
        $payment= Payment::find($id);
        
        return view('admin.payments.edit',compact('title','payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment=Payment::find($id);
        $transaction = Transaction::find($payment->transactionId);

        if($request->status==='Paid'){
            $transaction->update([
                'status'=> 'Paid'
            ]);
        }
        
        $payment->update([
            'status'=> $request->status
        ]);

        return redirect('/admin/payments')->with('success','Payment Status Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
