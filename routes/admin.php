<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {

    Route::get('/' ,function (){
        return redirect()->route('admin.dashboard');
    });

    Route::prefix('auth')->as('auth.')->middleware('guest:admin')->group(function () {
        Route::prefix('login')->as('login.')->group(function () {
            Route::get('/', [LoginController::class, 'index'])->name('index');
            Route::post('/', [LoginController::class, 'post'])->name('post');
        });

        Route::get('logout',[LogoutController::class,'index'])->name('logout')
            ->middleware('auth:admin')
        ;
    });

    Route::middleware('auth:admin')->group(function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('users')->as('users.')->controller(UsersController::class)->group(function (){
            Route::get('/','index')->name('index');

            Route::prefix('{userId}')->group(function (){
                Route::get('show','show')->name('show');

                Route::get('edit','edit')->name('edit');
                Route::put('update','update')->name('update');

                Route::delete('delete','delete')->name('delete');
            });

        });

        Route::prefix('orders')->as('orders.')->controller(OrderController::class)->group(function (){
            Route::get('/','index')->name('index');

            Route::prefix('{orderId}')->group(function (){
                Route::get('show','show')->name('show');

                Route::get('edit','edit')->name('edit');
                Route::put('update','update')->name('update');

                Route::delete('delete','delete')->name('delete');
            });

        });

    });

});
