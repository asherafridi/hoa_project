<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Polls;
use App\Models\PollVotes;

class PollsController extends Controller
{
    public function index()
    {
        $title = "Polls";
        $polls = Polls::orderBy('id', 'DESC')->paginate(10);
        return view('member.polls.list', compact('title', 'polls'));
    }
    public function store(Request $request)
    {
        PollVotes::create([
            'user_id' => auth()->user()->id,
            'option_id' => $request->option,
            'poll_id' => $request->poll_id
        ]);

        return redirect()->route('polls.index')->with('success', 'Poll Added Added Successfully');
    }
}
