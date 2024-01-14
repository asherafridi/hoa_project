<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VendorLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Vendor;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('vendor.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(VendorLoginRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::VENDOR_HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('vendor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }

    public function profile()
    {
        $admin = Auth::guard('vendor')->user();
        $title = "Profile";
        return view('vendor.profile', compact('title'));
    }

    public function profileUpdate(Request $request)
    {

        try {
            $admin = Vendor::find(Auth::guard('vendor')->user()->id);
            $admin->name = $request->name;
            $admin->contactEmail = $request->contactEmail;
            $admin->save();
            return redirect('/vendor/profile')->with('success', 'Operation Successfull');
        } catch (\Throwable $th) {
            return redirect('/vendor/profile')->with('error', $th);
        }

    }

    public function pictureUpdate(Request $request)
    {

        try {

            $admin = Admin::find(auth()->guard('vendor')->user()->id);
            $filePath = $request->file('picture')->store('uploads/vendor', 'public');
            $admin->picture = $filePath;
            $admin->save();
            return redirect('/vendor/profile')->with('success', 'Operation Successfull');
        } catch (\Throwable $th) {
            return redirect('/vendor/profile')->with('error', $th);
        }
    }

    public function profilePasswordUpdate(Request $request)
    {


        // $admin= Admin::find(Auth::guard('admin')->user()->id);
        // $admin_pass=$admin->password;
        // $old_pass=bcrypt($request->old_password);

        // echo $admin_pass;
        // echo "<br>";
        // echo $old_pass;

        // // if($admin_pass!==$old_pass){
        // //     
        // // }

        return redirect('/admin/profile')->with('error', 'Operation Not Successfull');

    }
}
