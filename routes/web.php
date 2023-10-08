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


Route::get('/',[SiteController::class,'home'])->name('home');
Route::get('gallery',[SiteController::class,'gallery'])->name('gallery');
Route::get('events',[SiteController::class,'events'])->name('events');
Route::get('documents',[SiteController::class,'documents'])->name('documents');



Route::get('placeholder-image/{size}', [ProfileController::class,'placeholderImage'])->name('placeholder.image');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/member.php';

