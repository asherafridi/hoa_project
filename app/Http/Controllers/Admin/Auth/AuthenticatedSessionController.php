<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        $title = "Profile";
        return view('admin.auth.profile', compact('title'));
    }

    public function profileUpdate(Request $request)
    {

        try {
            $admin = Admin::find(Auth::guard('admin')->user()->id);
            $admin->name = $request->firstName;
            $admin->email = $request->email;
            $admin->save();
            return redirect('/admin/profile')->with('success', 'Operation Successfull');
        } catch (\Throwable $th) {
            return redirect('/admin/profile')->with('error', $th);
        }

    }

    public function pictureUpdate(Request $request)
    {

        try {

            $admin = Admin::find(auth()->guard('admin')->user()->id);
            $filePath = $request->file('picture')->store('uploads/admin', 'public');
            $admin->picture = $filePath;
            $admin->save();
            return redirect('/admin/profile')->with('success', 'Operation Successfull');
        } catch (\Throwable $th) {
            return redirect('/admin/profile')->with('error', $th);
        }
    }

    public function profilePasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin_pass = $admin->password;

        // Check if old password is correct
        if (!password_verify($request->old_password, $admin_pass)) {
            return redirect('/admin/profile')->with('error', 'Incorrect old password');
        }

        // Update password
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect('/admin/profile')->with('success', 'Password updated successfully');

    }
}
