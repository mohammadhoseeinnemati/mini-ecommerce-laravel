<?php

use App\Http\Controllers\Account\OrderController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
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

Route::prefix('cart')->as('cart.')->group(function (){
    Route::get('/',[CartController::class,'index'])->name('index');
    Route::post('add',[CartController::class,'add'])->name('add');

    Route::get('{productId}/remove',[CartController::class,'remove'])->name('remove');
    Route::get('clear',[CartController::class,'clear'])->name('clear');

    Route::post('update-qty',[CartController::class,'updateQty'])->name('update-qty');
});

Route::prefix('checkout')->as('checkout.')->middleware('auth')->group(function (){
    Route::get('/',[CheckoutController::class,'index'])->name('index');
    Route::post('/',[CheckoutController::class,'post'])->name('post');
});
