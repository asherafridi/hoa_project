<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function index()
    {

        $title = "Committee";
        $committeeQuery = Committee::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $columns = \Schema::getColumnListing((new Committee())->getTable());

            $committeeQuery->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        $committee = $committeeQuery->paginate(10);

        return view('member.committee.list', compact('title', 'committee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Committee";
        return view('member.committee.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $request['adminId'] = auth()->user()->id;
        $calendar = new Committee;
        $calendar->create($request->all());
        return redirect('/committee')->with('success', 'Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "View Committee";
        $committee = Committee::find($id);
        return view('member.committee.detail', compact('title', 'committee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Committee";
        $committee = Committee::find($id);
        return view('member.committee.edit', compact('title', 'committee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $committee = Committee::find($id);
        $committee->update($request->all());
        return redirect('/committee')->with('success', 'Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Committee::find($id);
        $product->delete();
        return redirect('/committee')->with('success', 'Operation Successfull');
    }
}
