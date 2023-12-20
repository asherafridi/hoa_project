<?php


use App\Http\Controllers\Member\AnnouncementController;
use App\Http\Controllers\Member\BillsController;
use App\Http\Controllers\Member\CommitteeController;
use App\Http\Controllers\Member\DocumentController;
use App\Http\Controllers\Member\EventController;
use App\Http\Controllers\Member\HomeController;
use App\Http\Controllers\Member\PaymentController;
use App\Http\Controllers\Member\PollsController;
use App\Http\Controllers\ProfileController;
use App\Models\Committee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\WorkOrderController;

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::resource('work-order', WorkOrderController::class)->middleware(['auth']);
Route::resource('bills', BillsController::class)->middleware(['auth']);
Route::get('pay-bill/{id}', [BillsController::class, 'payBill'])->middleware(['auth'])->name('pay-bill');
Route::post('manual-pay', [BillsController::class, 'manualBillPay'])->middleware(['auth'])->name('manual-bill.pay');
Route::resource('payment', PaymentController::class)->middleware(['auth']);
Route::resource('committee', CommitteeController::class)->middleware(['auth']);
Route::resource('events', EventController::class)->middleware(['auth']);
Route::resource('announcement', AnnouncementController::class)->middleware(['auth']);
Route::resource('documents', DocumentController::class)->middleware(['auth']);
Route::resource('polls', PollsController::class)->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile-update', [ProfileController::class, 'updateMine'])->name('profile.updatemine');
    Route::post('/profile-picture', [ProfileController::class, 'pictureUpdate'])->name('profile.picture');
    Route::post('/profile-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});