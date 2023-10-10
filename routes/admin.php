<?php
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\BoardMemberController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\DocumentsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MemberTypeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PropertiesController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TransactionTypeController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\VendorTypeController;
use App\Http\Controllers\Admin\WordOrderController;
use App\Http\Controllers\Admin\FrontendController;
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
    
    Route::get('dashboard',[HomeController::class,'index'])->name('dashboard')->middleware('admin.auth');
    
    Route::resource('member', MemberController::class)->middleware('admin.auth');
    Route::resource('member-type', MemberTypeController::class)->middleware('admin.auth');
    
    Route::resource('properties', PropertiesController::class)->middleware('admin.auth');
    Route::resource('property-type', PropertyTypeController::class)->middleware('admin.auth');

    Route::resource('vendor', VendorController::class)->middleware('admin.auth');
    Route::resource('vendor-type', VendorTypeController::class)->middleware('admin.auth');

    Route::resource('work-order', WordOrderController::class)->middleware('admin.auth');

    
    Route::resource('transaction', TransactionController::class)->middleware('admin.auth');
    Route::resource('transaction-type', TransactionTypeController::class)->middleware('admin.auth');

    Route::resource('calendar', CalendarController::class)->middleware('admin.auth');
    Route::resource('committee', CommitteeController::class)->middleware('admin.auth');
    Route::resource('account', AccountController::class)->middleware('admin.auth');
    Route::resource('announcement', AnnouncementController::class)->middleware('admin.auth');
    Route::resource('billing', BillingController::class)->middleware('admin.auth');
    Route::resource('board-member', BoardMemberController::class)->middleware('admin.auth');
    Route::resource('documents', DocumentsController::class)->middleware('admin.auth');
    Route::resource('payments', PaymentController::class)->middleware('admin.auth');
    
    
    Route::resource('gallery', GalleryController::class)->middleware('admin.auth');
    

    Route::prefix('settings')->name('settings.')->group(function(){
        Route::get('frontend',[SettingsController::class,'frontend'])->middleware('admin.auth')->name('frontend');
        Route::post('frontend',[SettingsController::class,'frontendUpdate'])->middleware('admin.auth')->name('frontend.update');

        Route::get('website',[SettingsController::class,'website'])->middleware('admin.auth')->name('website');
        Route::post('logo',[SettingsController::class,'logoUpdate'])->middleware('admin.auth')->name('logo.update');
        Route::post('icon',[SettingsController::class,'iconUpdate'])->middleware('admin.auth')->name('icon.update');
        Route::post('name',[SettingsController::class,'nameUpdate'])->middleware('admin.auth')->name('name.update');
        
        Route::get('header',[SettingsController::class,'header'])->middleware('admin.auth')->name('header');
        Route::post('header',[SettingsController::class,'headerUpdate'])->middleware('admin.auth')->name('header.update');

        Route::get('about',[SettingsController::class,'about'])->middleware('admin.auth')->name('about');
        Route::post('about',[SettingsController::class,'aboutUpdate'])->middleware('admin.auth')->name('about.update');

        Route::resource('social',SocialIconController::class );
    });

    
    // Frontend
    Route::name('frontend.')->prefix('frontend')->group(function () {

            // Route::get('templates', 'templates')->name('templates');
            // Route::post('templates', 'templatesActive')->name('templates.active');
            Route::get('frontend-sections/{key}', [FrontendController::class,'frontendSections'])->name('sections');
            Route::post('frontend-content/{key}', [FrontendController::class,'frontendContent'])->name('sections.content');
            // Route::get('frontend-element/{key}/{id?}', 'frontendElement')->name('sections.element');
            Route::post('remove/{id}',  [FrontendController::class,'remove'])->name('remove');
        

        // Page Builder
        // Route::controller('PageBuilderController')->group(function () {
        //     Route::get('manage-pages', 'managePages')->name('manage.pages');
        //     Route::post('manage-pages', 'managePagesSave')->name('manage.pages.save');
        //     Route::post('manage-pages/update', 'managePagesUpdate')->name('manage.pages.update');
        //     Route::post('manage-pages/delete/{id}', 'managePagesDelete')->name('manage.pages.delete');
        //     Route::get('manage-section/{id}', 'manageSection')->name('manage.section');
        //     Route::post('manage-section/{id}', 'manageSectionUpdate')->name('manage.section.update');
        // });

    });
    

});
