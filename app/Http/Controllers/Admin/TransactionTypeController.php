<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $title="Transaction Type";
        $transationType = TransactionType::paginate(10);
        return view('admin.transaction-type.list',compact('title','transationType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $title="Add Transaction Type";
        return view('admin.transaction-type.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' =>'required'
        ]);
        $data = $request->all();
        TransactionType::create($data);
        return redirect()->route('admin.transaction-type.index')->with('success','Transaction Type Added Successfully');
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
        $title="Transaction Type";
        $transationType=TransactionType::find($id);
        return view('admin.transaction-type.edit',compact('title','transationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    // Validate the incoming data
    $request->validate([
        'name' => 'required',
    ]);

    // Find the TransactionType record you want to update
    $TransactionType = TransactionType::findOrFail($id);

    // Update the record with the new data
    $TransactionType->update([
        'name' => $request->input('name'),
        // Add more fields to update as needed
    ]);

    // Redirect back to the index page with a success message
    return redirect()->route('admin.transaction-type.index')->with('success', 'Transaction Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    // Find the TransactionType record you want to "soft" delete
    $TransactionType = TransactionType::findOrFail($id);

    // Soft delete the record
    $TransactionType->delete();

    // Redirect back to the index page with a success message
    return redirect()->route('admin.transaction-type.index')->with('success', 'Transaction Type Deleted Successfully');
    }
}
