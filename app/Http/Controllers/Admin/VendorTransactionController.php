<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = "Vendor Transactions";
        $query = Transaction::query();
        $query->where('vendorId', '!=', null);
        if (request()->has('search')) {
            $search = request()->input('search');
            $columns = \Schema::getColumnListing((new Transaction())->getTable());

            $query->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        if ($request->type !== null) {
            $query->where('transactionType', $request->type);
        }

        $transactions = $query->paginate(10);

        $transaction_type = TransactionType::get();

        return view('admin.vendor-transaction.list', compact('title', 'transactions', 'transaction_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Vendor Transaction";
        $type = TransactionType::all();
        $users = Vendor::all();
        return view('admin.vendor-transaction.add', compact('title', 'type', 'users'));
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
        $title = "Edit Vendor Transaction";
        $type = TransactionType::all();
        $users = Vendor::all();
        $transaction = Transaction::findOrFail($id);
        return view('admin.vendor-transaction.edit', compact('title', 'type', 'users', 'transaction'));
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
