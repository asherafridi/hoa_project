<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardMembers;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Board Members";
        $boardmember = BoardMembers::paginate(10);
        return view('admin.board-member.list',compact('title','boardmember'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Board Member";
        return view('admin.board-member.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['adminId']=auth()->guard('admin')->user()->id;
        $boardmember = new BoardMembers;
        $boardmember->create($request->all());
        return redirect('/admin/board-member')->with('success','Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="View Board Member";
        $boardmember=BoardMembers::find($id);
        return view('admin.board-member.detail',compact('title','boardmember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $title="Edit Board Member";
        $boardmember=BoardMembers::find($id);
        
        return view('admin.board-member.edit',compact('title','boardmember'));
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

        $boardmember = BoardMembers::find($id);
        $boardmember->update($request->all());
        return redirect('/admin/board-member')->with('success','Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $boardmember=BoardMembers::find($id);
        $boardmember->delete();
        return redirect('/admin/board-member')->with('success','Operation Successfull');
    }
}
