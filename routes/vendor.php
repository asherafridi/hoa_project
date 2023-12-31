<?php
use App\Http\Controllers\Vendor\AnnouncementController;
use App\Http\Controllers\Vendor\BillsController;
use App\Http\Controllers\Vendor\CommitteeController;
use App\Http\Controllers\Vendor\EventController;
use App\Http\Controllers\Vendor\DocumentController;
use App\Http\Controllers\Vendor\GalleryController;
use App\Http\Controllers\Vendor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Vendor\Auth\RegisteredVendorController;
use App\Http\Controllers\Vendor\HomeController;
use App\Http\Controllers\Vendor\PaymentController;
use App\Http\Controllers\Vendor\WorkOrderController;
use App\Models\Committee;
use Illuminate\Support\Facades\Route;



Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::namespace('Auth')->group(function () {

        Route::get('register', [RegisteredVendorController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredVendorController::class, 'store']);
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest.vendor');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login')->middleware('guest.vendor');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('profile', [AuthenticatedSessionController::class, 'profile'])->name('profile');

        Route::post('profile/update', [AuthenticatedSessionController::class, 'profileUpdate'])->name('profile.update');
        Route::post('profile/image', [AuthenticatedSessionController::class, 'pictureUpdate'])->name('profile.picture');
        Route::post('profile/password/update', [AuthenticatedSessionController::class, 'profilePasswordUpdate'])->name('profile.password_update');
    });

    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('vendor.auth');

    Route::resource('announcement', AnnouncementController::class)->middleware('vendor.auth');
    Route::resource('events', EventController::class)->middleware(['vendor.auth']);
    Route::resource('gallery', GalleryController::class)->middleware(['vendor.auth']);
    Route::resource('documents', DocumentController::class)->middleware(['vendor.auth']);
    Route::resource('committee', CommitteeController::class)->middleware(['vendor.auth']);
    Route::resource('payment', PaymentController::class)->middleware(['vendor.auth']);

    Route::resource('bills', BillsController::class)->middleware(['vendor.auth']);
    Route::get('pay-bill/{id}', [BillsController::class, 'payBill'])->middleware(['vendor.auth'])->name('pay-bill');
    Route::post('manual-pay', [BillsController::class, 'manualBillPay'])->middleware(['vendor.auth'])->name('manual-bill.pay');
    Route::resource('work-order', WorkOrderController::class)->middleware(['vendor.auth']);
});
