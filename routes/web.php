<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('event', [SiteController::class, 'events'])->name('event');
Route::get('event/{id}', [SiteController::class, 'eventPage'])->name('event.page');
Route::get('document', [SiteController::class, 'documents'])->name('document');
Route::get('thank-you', [SiteController::class, 'thankYou'])->name('thanks');
Route::get('member-approval', [SiteController::class, 'memberApproval'])->name('member.approval');

Route::post('contact_form', [SiteController::class, 'contactForm'])->name('contact_form');
Route::post('news-letter', [SiteController::class, 'newsForm'])->name('news_form');


Route::get('placeholder-image/{size}', [ProfileController::class, 'placeholderImage'])->name('placeholder.image');


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/member.php';
require __DIR__ . '/vendor.php';

