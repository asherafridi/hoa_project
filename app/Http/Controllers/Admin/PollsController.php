<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Polls;
use App\Models\PollVotes;
use Illuminate\Http\Request;
use App\Models\PollOptions;

class PollsController extends Controller
{
    public function index()
    {

        $title = "Polls";
        $polls = Polls::paginate(10);
        return view('admin.polls.list', compact('title', 'polls'));
    }

    public function create()
    {

        $title = "Add Polls";
        return view('admin.polls.add', compact('title'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $poll = Polls::create([
            'question' => $request->poll_question
        ]);
        foreach ($request->options as $item) {
            PollOptions::create([
                'poll_id' => $poll->id,
                'option_text' => $item
            ]);
        }
        return redirect()->route('admin.polls.index')->with('success', 'Poll Added Added Successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $title = "Phase";
        $propertyType = Phase::find($id);
        return view('admin.phase.edit', compact('title', 'propertyType'));
    }
    public function update(Request $request, string $id)
    {

        // Validate the incoming data
        $request->validate([
            'name' => 'required',
        ]);

        // Find the PropertyType record you want to update
        $PropertyType = Phase::findOrFail($id);

        // Update the record with the new data
        $PropertyType->update([
            'name' => $request->input('name'),
            // Add more fields to update as needed
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('admin.phase.index')->with('success', 'Property Type Updated Successfully');
    }

    public function destroy(string $id)
    {

        Polls::find($id)->delete();
        PollVotes::where('poll_id', $id)->delete();
        PollOptions::where('poll_id', $id)->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('admin.polls.index')->with('success', 'Poll Deleted Successfully');
    }
    public function changeAnnouncement($id){
        
        $poll = Polls::find($id);
        $result;
        $poll->result == 0 ? $result =1 : $result = 0;
        $poll->result = $result;
        $poll->save();
        
        
        return redirect()->route('admin.polls.index')->with('success', 'Poll Announcement Status Updated');
    }
    public function report($id){
        return redirect()->route('admin.polls.index')->with('success', 'We are working on this feature');
        
    }
}
