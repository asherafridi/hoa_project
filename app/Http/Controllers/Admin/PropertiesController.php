<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Property";
        $query = Properties::query();

        if (request()->has('search')) {
            $search = request()->input('search');
            $columns = \Schema::getColumnListing((new Properties())->getTable());

            $query->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }

                $subquery->orWhereHas('propertyType', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
                $subquery->orWhereHas('blocks', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
                $subquery->orWhereHas('phases', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
            });
        }

        $properties = $query->paginate(10);

        return view('admin.properties.list', compact('title', 'properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Property";
        $type = PropertyType::all();
        $block = Block::all();
        return view('admin.properties.add', compact('title', 'type', 'block'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'propertyType' => 'required',
            'address' => 'required',
            'unit_no' => 'required',
            'status' => 'required',
            'block_id' => 'required'
        ]);

        $properties = new Properties;
        $block = Block::find($request->block_id);
        $request['phase_id'] = $block->phase_id;
        $properties->create($request->all());
        return redirect()->route('admin.properties.index')->with('success', 'Property Added Successfully');
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

        $title = "Edit Property";
        $property = Properties::find($id);
        $block = Block::all();
        $types = PropertyType::all();
        return view('admin.properties.edit', compact('title', 'property', 'types', 'block'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'propertyType' => 'required',
            'address' => 'required',
            'unit_no' => 'required',
            'status' => 'required',
            'block_id' => 'required'
        ]);

        $properties = Properties::find($id);
        $block = Block::find($request->block_id);
        $request['phase_id'] = $block->phase_id;
        $properties->update($request->all());
        return redirect()->route('admin.properties.index')->with('success', 'Property Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $properties = Properties::find($id);
        $properties->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Property Deleted Successfully');
    }
}
