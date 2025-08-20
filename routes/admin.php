<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {

    Route::prefix('auth')->as('auth.')->middleware('guest:admin')->group(function () {
        Route::prefix('login')->as('login.')->group(function () {
            Route::get('/', [LoginController::class, 'index'])->name('index');
            Route::post('/', [LoginController::class, 'post'])->name('post');
        });
    });

    Route::middleware('auth:admin')->group(function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

});
