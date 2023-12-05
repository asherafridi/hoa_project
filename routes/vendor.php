<?php
use App\Http\Controllers\Vendor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Vendor\Auth\RegisteredVendorController;
use Illuminate\Support\Facades\Route;



Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::namespace('Auth')->group(function () {

        Route::get('register', [RegisteredVendorController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredVendorController::class, 'store']);
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest.vendor');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin_login')->middleware('guest.vendor');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('profile', [AuthenticatedSessionController::class, 'profile'])->name('profile');

        Route::post('profile/update', [AuthenticatedSessionController::class, 'profileUpdate'])->name('profile.update');
        Route::post('profile/image', [AuthenticatedSessionController::class, 'pictureUpdate'])->name('profile.picture');
        Route::post('profile/password/update', [AuthenticatedSessionController::class, 'profilePasswordUpdate'])->name('profile.password_update');
    });

});
