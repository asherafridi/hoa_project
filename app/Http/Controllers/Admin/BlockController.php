<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Phase;
use Illuminate\Http\Request;

class BlockController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Block";
        $query = Block::query();

        if (request()->has('search')) {
            $search = request()->input('search');
            $columns = \Schema::getColumnListing((new Block())->getTable());

            $query->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }

                $subquery->orWhereHas('phase', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
            });
        }

        $properties = $query->paginate(10);

        return view('admin.block.list', compact('title', 'properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Block";
        $type = Phase::all();
        return view('admin.block.add', compact('title', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phase_id' => 'required',
        ]);


        $properties = new Block;
        $properties->create($request->all());
        return redirect()->route('admin.block.index')->with('success', 'Block Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "View Block";
        $property = Block::find($id);

        $type = Phase::all();
        return view('admin.block.detail', compact('title', 'property', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $title = "Edit Block";
        $property = Block::find($id);

        $types = Phase::all();
        return view('admin.block.edit', compact('title', 'property', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phase_id' => 'required',
        ]);

        $properties = Block::find($id);
        $properties->update($request->all());
        return redirect()->route('admin.block.index')->with('success', 'Block Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properties = Block::find($id);
        $properties->delete();
        return redirect()->route('admin.block.index')->with('success', 'Block Deleted Successfully');
    }
}
