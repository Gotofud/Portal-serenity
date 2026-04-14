<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Api Auth
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Api Logout
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::resource('/guest',\App\Http\Controllers\Api\GuestReportController::class);
    Route::get('/guest-types',[\App\Http\Controllers\Api\GuestReportController::class,'guestTypes'])->name('guest-types');
    Route::resource('/news',\App\Http\Controllers\Api\NewsController::class);
    Route::resource('/report',\App\Http\Controllers\Api\ReportController::class);
    Route::resource('/stall',\App\Http\Controllers\Api\StallsController::class);
});