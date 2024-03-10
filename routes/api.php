<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->group(function () {
    Route::middleware('auth:admin')->group(function () {
//        Route::apiResource('admins', AdminController::class);
        Route::post('admins/logout', [AdminController::class, 'logout'])->name('admins.logout');
        Route::post('admins/login', [AdminController::class, 'login'])->name('admins/login');
    });
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::apiResource('admins', AdminController::class);
});



