<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\RegisterController;

Route::prefix('auth')->as('auth.')->group(function () {

    Route::middleware('guest')->group(function (){
        Route::prefix('login')->as('login.')->group(function () {
            Route::get('/', [LoginController::class, 'index'])->name('index');
            Route::post('/', [LoginController::class, 'post'])->name('post');
        });

        Route::prefix('register')->as('register.')->group(function () {
            Route::get('/', [RegisterController::class, 'index'])->name('index');
            Route::post('/', [RegisterController::class, 'post'])->name('post');
        });

        Route::prefix('otp')->as('otp.')->group(function () {
            Route::get('/', [OtpController::class, 'index'])->name('index');
            Route::post('/', [OtpController::class, 'otp'])->name('post');
        });
    });

    Route::get('/',[LogoutController::class,'index'])
        ->middleware('auth')
        ->name('logout.index');
});
