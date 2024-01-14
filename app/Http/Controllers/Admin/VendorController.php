<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Vendor";
        $query = Vendor::query();

        if (request()->has('search')) {
            $search = request()->input('search');
            $columns = \Schema::getColumnListing((new Vendor())->getTable());

            $query->where(function ($subquery) use ($search, $columns) {
                foreach ($columns as $column) {
                    $subquery->orWhere($column, 'LIKE', '%' . $search . '%');
                }

                $subquery->orWhereHas('vendorType', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'LIKE', '%' . $search . '%');
                    // Add more conditions as needed
                });
            });
        }

        $vendor = $query->paginate(10);

        return view('admin.vendor.list', compact('title', 'vendor'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Vendor";
        $type = VendorType::get();
        return view('admin.vendor.add', compact('title', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'contactPerson' => 'required',
            'contactNumber' => 'required',
            'serviceDescription' => 'required',
        ]);
        $vendor = new Vendor;
        $request['password'] = Hash::make('12345678');
        $vendor->create($request->all());
        return redirect('/admin/vendor')->with('success', 'Vendor Added Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $title = "View Vendor";
        $vendor = Vendor::find($id);
        $type = VendorType::get();
        return view('admin.vendor.detail', compact('title', 'vendor', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Vendor";
        $vendor = Vendor::find($id);
        $types = VendorType::get();
        return view('admin.vendor.edit', compact('title', 'vendor', 'types'));
    }

    public function secretLogin(string $id)
    {

        $member = Vendor::find($id);

        Auth::guard('vendor')->login($member);

        return redirect(RouteServiceProvider::VENDOR_HOME);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'contactPerson' => 'required',
            'contactNumber' => 'required',
            'serviceDescription' => 'required',
        ]);

        $vendor = Vendor::find($id);
        $vendor->update($request->all());
        return redirect('/admin/vendor')->with('success', 'Vendor Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect('/admin/vendor')->with('success', 'Vendor Added Successfull');
    }
}
