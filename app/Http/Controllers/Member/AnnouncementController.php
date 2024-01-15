<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Announcements";
        $announcementQuery = Announcement::query();
        $announcementQuery->whereIn('forUser', ['Members Only', 'Both']);
        $announcementQuery->where('forUser', '!=', null);

        if ($request->has('search')) {
            $search = $request->input('search');
            $columns = \Schema::getColumnListing((new Announcement())->getTable());

            $announcementQuery->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        $announcement = $announcementQuery->paginate(10);

        return view('member.announcement.list', compact('title', 'announcement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Announcement";
        return view('member.announcement.add', compact('title'));
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

        $request['adminId'] = auth()->user()->id;
        $announcement = new Announcement;
        $announcement->create($request->all());
        return redirect('/announcement')->with('success', 'Please Wait For Admin Approval');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "View Announcement";
        $announcement = Announcement::find($id);
        return view('member.announcement.detail', compact('title', 'announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $title = "Edit Announcement";
        $announcement = Announcement::find($id);

        return view('member.announcement.edit', compact('title', 'announcement'));
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

        $announcement = Announcement::find($id);
        $announcement->update($request->all());
        return redirect('/announcement')->with('success', 'Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();
        return redirect('/announcement')->with('success', 'Operation Successfull');
    }
}
