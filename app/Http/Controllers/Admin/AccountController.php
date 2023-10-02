<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Accounts";
        $account = Accounts::paginate(10);
        return view('admin.account.list',compact('title','account'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Account";
        $users=User::all();
        return view('admin.account.add',compact('title','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated=$request->validate([
        //     'eventName'=>'required',
        //     'startDate'=>'required',
        //     'endDate'=>'required',
        //     'location'=>'required',
        //     'committeeId'=>'required'
        // ]);

        $account = new Accounts;
        $account->create($request->all());
        return redirect('/admin/account')->with('success','Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="View Account";
        $account=Accounts::find($id);
        $users=User::all();
        return view('admin.account.detail',compact('title','account','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $title="Edit Account";
        $account=Accounts::find($id);
        
        $users=User::all();
        return view('admin.account.edit',compact('title','account','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        // $validated=$request->validate([
        //     'eventName'=>'required',
        //     'startDate'=>'required',
        //     'endDate'=>'required',
        //     'location'=>'required',
        //     'committeeId'=>'required'
        // ]);

        $account = Accounts::find($id);
        $account->update($request->all());
        return redirect('/admin/account')->with('success','Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account=Accounts::find($id);
        $account->delete();
        return redirect('/admin/account')->with('success','Operation Successfull');
    }
}
