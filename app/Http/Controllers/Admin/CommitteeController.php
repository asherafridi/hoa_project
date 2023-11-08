<?php

namespace App\Http\Controllers\Admin;

use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Committee";
        $query = Committee::query();

        if (request()->has('search')) {
            $search = request()->input('search');
            $columns = \Schema::getColumnListing((new Committee())->getTable());

            $query->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        $committee = $query->paginate(10);

        return view('admin.committee.list', compact('title', 'committee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Committee";
        return view('admin.committee.add', compact('title'));
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
        $request['adminId'] = auth()->guard('admin')->user()->id;
        $calendar = new Committee;
        $calendar->create($request->all());
        return redirect('/admin/committee')->with('success', 'Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "View Committee";
        $committee = Committee::find($id);
        return view('admin.committee.detail', compact('title', 'committee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Committee";
        $committee = Committee::find($id);
        return view('admin.committee.edit', compact('title', 'committee'));
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
        return redirect('/admin/committee')->with('success', 'Operation Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Committee::find($id);
        $product->delete();
        return redirect('/admin/committee')->with('success', 'Operation Successfull');
    }
}
