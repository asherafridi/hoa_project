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
use Illuminate\Support\Facades\Hash;

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


        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $vendor = Admin::find(Auth::guard('vendor')->user()->id);
        $vendor_pass = $vendor->password;

        // Check if old password is correct
        if (!password_verify(Hash::make($request->old_password), $vendor_pass)) {
            return redirect('/vendor/profile')->with('error', 'Incorrect old password');
        }

        // Update password
        $vendor->password = Hash::make($request->password);
        $vendor->save();

        return redirect('/vendor/profile')->with('success', 'Password updated successfully');

    }
}
