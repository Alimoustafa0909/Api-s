<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'dashboard.', 'middleware' => ['auth:admin']], function () {
    Route::get('/dashboard', [AdminLoginController::class, 'dashboard']);
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('contacts', ContactController::class);

});

