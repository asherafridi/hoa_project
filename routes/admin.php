<?php
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin.')->group(function (){
    Route::namespace('Auth')->group(function(){
        Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
        Route::post('login',[AuthenticatedSessionController::class,'store'])->name('admin_login');
        Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

        Route::get('profile',[AuthenticatedSessionController::class,'profile'])->name('profile');
        
        Route::post('profile/update',[AuthenticatedSessionController::class,'profileUpdate'])->name('profile.update');
        Route::post('profile/password/update',[AuthenticatedSessionController::class,'profilePasswordUpdate'])->name('profile.password_update');
    });
    
    Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::resource('calendar', CalendarController::class);

});
