<?php

use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('index');

Route::prefix('account')->as('account.')->middleware('auth')->group(function (){
    Route::get('orders',[OrderController::class,'index'])->name('orders.index');

    Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
    Route::post('profile',[ProfileController::class,'post'])->name('profile.post');
});
