<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredVendorController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $vendorType = VendorType::get();
        return view('vendor.auth.register', compact('vendorType'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contactNumber' => ['required', 'string', 'max:255'],
            'vendorType' => ['required'],
            'contactEmail' => ['required', 'string', 'email', 'max:255', 'unique:' . Vendor::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = Vendor::create([
            'name' => $request->name,
            'contactNumber' => $request->contactNumber,
            'contactEmail' => $request->contactEmail,
            'vendorType' => $request->vendorType,
            'password' => Hash::make($request->password),
        ]);


        // Auth::login($user);
        // RouteServiceProvider::HOME
        return redirect()->route('home');
    }
}
