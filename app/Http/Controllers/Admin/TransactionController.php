<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Transactions";
        $query = Transaction::query();

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

        return view('admin.transaction.list', compact('title', 'transactions', 'transaction_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Transaction";
        $type = TransactionType::all();
        $users = User::all();
        return view('admin.transaction.add', compact('title', 'type', 'users'));
    }
    public function createVendor()
    {
        $title = "Add Transaction";
        $type = TransactionType::all();
        $users = Vendor::all();
        return view('admin.transaction.add-vendor', compact('title', 'type', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transactionType' => 'required',
            'transactionDate' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $transactions = new Transaction;
        $transactions->create($request->all());
        return redirect()->route('admin.transaction.index')->with('success', 'Transaction Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "View Property";
        $property = Properties::find($id);

        $type = PropertyType::all();
        return view('admin.properties.detail', compact('title', 'property', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $title = "Edit Transaction";
        $type = TransactionType::all();
        $users = User::all();
        $transaction = Transaction::findOrFail($id);
        return view('admin.transaction.edit', compact('title', 'type', 'users', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return redirect()->route('admin.transaction.index')->with('error', 'Transaction not found');
        }

        // Update the transaction with the new data from the request.
        $transaction->update([
            'userId' => $request->userId,
            'transactionType' => $request->transactionType,
            'transactionDate' => $request->transactionDate,
            'amount' => $request->amount,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.transaction.index')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properties = Transaction::find($id);
        $properties->delete();
        return redirect()->route('admin.transaction.index')->with('success', 'Property Deleted Successfully');
    }
}
