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

    public function profile(){
        $admin=Auth::guard('admin')->user();
        $title = "Profile";
        return view('admin.auth.profile',compact('title'));
    }

    public function profileUpdate(Request $request){
        
        try {
            $admin= Admin::find(Auth::guard('admin')->user()->id);
            $admin->name=$request->firstName;
            $admin->email=$request->email;
            $admin->save();
            return redirect('/admin/profile')->with('success','Operation Successfull');
        } catch (\Throwable $th) {
            return redirect('/admin/profile')->with('error',$th);
        }
        
    }

    public function profilePasswordUpdate(Request $request){

        
        // $admin= Admin::find(Auth::guard('admin')->user()->id);
        // $admin_pass=$admin->password;
        // $old_pass=bcrypt($request->old_password);

        // echo $admin_pass;
        // echo "<br>";
        // echo $old_pass;

        // // if($admin_pass!==$old_pass){
        // //     
        // // }

        return redirect('/admin/profile')->with('error','Operation Not Successfull');

    }
}
