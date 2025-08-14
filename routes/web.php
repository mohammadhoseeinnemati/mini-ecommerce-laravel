<?php

use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('index');

Route::prefix('account')->as('account.')->middleware('auth')->group(function (){
    Route::get('orders',[OrderController::class,'index'])->name('orders.index');

    Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
    Route::put('profile',[ProfileController::class,'post'])->name('profile.post');
});

Route::prefix('products')->as('products.')->group(function (){

    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('remove-filter',[ProductController::class,'removeFilter'])->name('remove-filter');
    Route::get('/{product_id}',[ProductController::class,'show'])->name('show');

});
