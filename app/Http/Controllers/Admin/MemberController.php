<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Phase;
use App\Models\Properties;
use App\Models\User;
use App\Models\UserType;
use GuzzleHttp\Psr7\Response;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = "Members";
        $query = User::query();
        $query->leftJoin('properties', 'properties.id', '=', 'users.propertyId');
        $query->select(
            'users.*',
            'properties.phase_id',
            'properties.block_id',
        );





        if (request()->has('search')) {
            $search = request()->input('search');
            $query->orWhere('firstName', 'LIKE', '%' . $search . '%');
            $query->orWhere('lastName', 'LIKE', '%' . $search . '%');
        }
        if ($request->has('property')) {


            $query->where('propertyId', $request->property);
        }
        if ($request->has('status')) {
            $query->where('users.status', $request->status);
        }
        if ($request->lot_number !== null) {
            $query->where('lot_number', $request->lot_number);
        }

        $boardmember = $query->paginate(10);

        // return $boardmember;

        if (request()->has('download')) {
            // $query->get();
            // $users = $boardmember;

            // // Extract the attributes from the first user to dynamically generate CSV header
            // $attributes = $users->isEmpty() ? [] : array_keys($users->first()->getAttributes());



            // // Prepare CSV content with dynamic header
            // $csvContent = implode(',', $attributes) . "\n";

            // foreach ($users->all() as $user) {
            //     $csvContent .= implode(',', $user->toArray()) . "\n";
            // }

            // // Prepare the response with appropriate headers
            // $headers = [
            //     'Content-type' => 'text/csv',
            //     'Content-Disposition' => 'attachment; filename=members.csv',
            //     'Pragma' => 'no-cache',
            //     'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            //     'Expires' => '0',
            // ];

            // return response()->make($csvContent, 200, $headers);
            $users = User::select('id', 'firstName', 'lastName', 'email', 'phone', 'lot_number', 'created_at', 'updated_at')->get();

            // Prepare CSV content with dynamic header
            $csvContent = implode(',', array_keys($users->first()->getAttributes()) . ',User Type,Block,Phase') . "\n";

            foreach ($users->all() as $user) {
                $csvContent .= implode(',', $user->getAttributes()) . "\n";
            }

            // Prepare the response with appropriate headers
            $headers = [
                'Content-type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename=members.csv',
                'Pragma' => 'no-cache',
                'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                'Expires' => '0',
            ];

            return response()->make($csvContent, 200, $headers);
        }
        $properties = Properties::get();
        $block = Block::all();
        $phase = Phase::all();


        return view('admin.member.list', compact('title', 'boardmember', 'properties', 'block', 'phase'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Member";
        $properties = Properties::get();
        $type = UserType::get();
        return view('admin.member.add', compact('title', 'properties', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'userType' => 'required',
            'propertyId' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.member.index')->with('success', 'Member Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $title = "Edit Member";
        $member = User::find($id);
        $properties = Properties::get();
        $types = UserType::get();
        return view('admin.member.edit', compact('title', 'member', 'properties', 'types'));
    }
    public function secretLogin(string $id)
    {

        $member = User::find($id);

        Auth::login($member);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'userType' => 'required',
            'propertyId' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Find the user to update by their ID
        $user = User::findOrFail($id);


        // Update the user's data
        if ($request->has('password')) {

            $user->update([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'phone' => $request->input('phone'),
                'lot_number' => $request->input('lot_number'),
                'userType' => $request->input('userType'),
                'propertyId' => $request->input('propertyId'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'status' => $request->input('status'),
            ]);
        } else {
            $user->update([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'phone' => $request->input('phone'),
                'lot_number' => $request->input('lot_number'),
                'userType' => $request->input('userType'),
                'propertyId' => $request->input('propertyId'),
                'email' => $request->input('email'),
                'status' => $request->input('status'),
            ]);
        }


        return redirect()->route('admin.member.index')->with('success', 'Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $boardmember = User::find($id);
        $boardmember->delete();

        return redirect()->route('admin.member.index')->with('success', 'Member Deleted Successfully');
    }
    public function getMember(Request $request)
    {

        $query = User::query();
        $query->leftJoin('properties', 'properties.id', '=', 'users.propertyId');
        $query->leftJoin('user_type', 'user_type.id', '=', 'users.userType');
        $query->leftJoin('phase', 'phase.id', '=', 'properties.phase_id');
        $query->leftJoin('block', 'block.id', '=', 'properties.block_id');

        $query->select(
            'users.*',
            'properties.name as propertyName',
            'user_type.name as user_type_name',
            'phase.name as phase_name',
            'block.name as block_name',
        );

        if ($request->has('status') && $request->get('status') != null) {
            $query->where('users.status', $request->status);
        }


        if ($request->has('lot_number') && $request->get('lot_number') != null) {
            $query->where('users.lot_number', $request->lot_number);
        }

        if ($request->has('search') && $request->get('search') != null) {
            $search = request()->input('search');
            $query->where('firstName', 'LIKE', '%' . $search . '%');
        }

        if ($request->has('property') && $request->get('property') != null) {
            $query->where('users.propertyId', $request->property);
        }



        if ($request->has('phase') && $request->get('phase') != null) {
            $query->where('phase.id', $request->phase);
        }

        if ($request->has('block') && $request->get('block') != null) {
            $query->where('block.id', $request->block);
        }

        $member = $query->get();

        return response()->json($member);
    }
}
