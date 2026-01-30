<?php

use App\Http\Controllers\Admin\Service\ContactController;
use App\Http\Controllers\GetData;
use App\Http\Middleware\Security;
use App\Models\Master\Faq;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\CUController;
use App\Http\Controllers\Admin\Master\NUController;
use App\Http\Controllers\Admin\Master\BlockController;
use App\Http\Controllers\Admin\Master\BuildingTypes;
use App\Http\Controllers\Admin\Master\RoleController;
use App\Http\Controllers\Admin\Master\StallsPlaceController;
use App\Http\Controllers\Admin\Master\VehicleTypeController;
use App\Http\Controllers\Admin\Master\GuestTypeController;
use App\Http\Controllers\Admin\Master\FaqController;
use App\Http\Controllers\GoogleAuthController;


// Auth Biasa
Auth::routes();
// Auth Google
Route::get('/auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
// Route Get RT
Route::get('/get-rt/{community_id}', [GetData::class, 'getRt']);

// Admin Route
// Master
Route::prefix('dashboard')->as('dashboard.')->middleware(['auth', Security::class])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::resource('/community-unit', App\Http\Controllers\Admin\Master\CUController::class);
    Route::resource('/neighborhood-unit', App\Http\Controllers\Admin\Master\NUController::class);
    Route::resource('/block', App\Http\Controllers\Admin\Master\BlockController::class);
    Route::resource('/building-type', App\Http\Controllers\Admin\Master\BuildingTypes::class);
    Route::resource('/role', App\Http\Controllers\Admin\Master\RoleController::class);
    Route::resource('/stall-place', App\Http\Controllers\Admin\Master\StallsPlaceController::class);
    Route::resource('/vehicle-type', App\Http\Controllers\Admin\Master\VehicleTypeController::class);
    Route::resource('/guest-type', App\Http\Controllers\Admin\Master\GuestTypeController::class);
    Route::resource('/faq', App\Http\Controllers\Admin\Master\FaqController::class);
    Route::resource('/banner', App\Http\Controllers\Admin\Master\BannerController::class);
    Route::resource('/house', App\Http\Controllers\Admin\Master\HouseController::class);
});
// Service
Route::prefix('service')->as('service.')->middleware(['auth', Security::class])->group(function () {
    Route::resource('/announcements', App\Http\Controllers\Admin\Service\AnnouncementsController::class);
    Route::resource('/report', App\Http\Controllers\Admin\Service\ReportController::class);
    Route::resource('/stall', App\Http\Controllers\Admin\Service\StallController::class);
    Route::resource('/ads', App\Http\Controllers\Admin\Service\AdsController::class);
    Route::resource('/contact', App\Http\Controllers\Admin\Service\ContactController::class);
    Route::get('/contact/{contact}/reply', [ContactController::class, 'reply'])
        ->name('contact.reply');
    Route::post('/contact/{contact}/reply', [ContactController::class, 'sendReply'])
        ->name('contact.sendReply');
    Route::resource('/news', App\Http\Controllers\Admin\Service\NewsController::class);
    // Route Support
    Route::get('/support',function (){
        return view('admin.service.support');
    })->name('support');;
});
// Resident
Route::prefix('resident')->as('resident.')->middleware(['auth', Security::class])->group(function () {
    Route::resource('/operator', App\Http\Controllers\Admin\Resindet\OperatorController::class);
    Route::resource('/user', App\Http\Controllers\Admin\Resindet\UserController::class);
    Route::resource('/guest', App\Http\Controllers\Admin\Resindet\GuestController::class);
});
// Finance
Route::prefix('finance')->as('finance.')->middleware(['auth', Security::class])->group(function () {
    Route::resource('/agreement', App\Http\Controllers\Admin\Finance\AgreementController::class);
    Route::resource('/bill', App\Http\Controllers\Admin\Finance\BillController::class);
});

// User Route
Route::get('/', function () {
    $faq = Faq::all();
    return view('welcome', compact('faq'));
});
Route::resource('/contact', App\Http\Controllers\User\Service\Contact::class);

Route::group([
    'middleware' => ['auth']
], function () {
    Route::resource('user-profile', App\Http\Controllers\User\UserProfileController::class);
});
