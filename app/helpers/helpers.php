<?php

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

if(!function_exists('backWithError')){
    function backWithError(string $message): RedirectResponse
    {
        return back()
            ->withErrors([
                'general' => $message
            ]);
    }
}

if(!function_exists('getAuthenticatedUserFullName')){
    function getAuthenticatedUserFullName(string $guard = null): string
    {
        $user = auth($guard)->user();

        return "$user->first_name $user->last_name";
    }
}

if(!function_exists('activeSidebarItem')){
    function activeSidebarItem(string $targetRouteName, string $class = 'active'):string
    {
        $currentRouteName = Route::currentRouteName();

        if($currentRouteName != $targetRouteName){
            return '';
        }

        return $class;
    }
}

if(!function_exists('getProductDiscount')){
    function getProductDiscount(int $price , int $discount):int
    {
       return ($discount * 100) / $price;
    }
}

if(!function_exists('getCartProductsCount')){
    function getCartProductsCount():int
    {
       $userCart = session('user_cart',[]);

       return count($userCart);
    }
}

if(!function_exists('getCartProductCount')){
    function getCartProductCount(int $productId, int $default = 0 ):int
    {
       $userCart = session('user_cart',[]);

       if(!isset($userCart[$productId])){
           return $default;
       }

       return $userCart[$productId]['qty'];
    }
}

if(!function_exists('getCartProducts')){
    function getCartProducts():array
    {
        $userCartItems = session('user_cart',[]);

        foreach ($userCartItems as $productId => $cart){
            $product =  Product::find($productId);
            $userCartItems[$productId]['product']= $product;

        }
       return $userCartItems;
    }
}

if(!function_exists('getCartInfo')){
    function getCartInfo():array
    {
        $cartProducts = getCartProducts();

        $totalPrice = 0;
        $totalDiscount = 0;

        foreach ($cartProducts as $cart){

            $totalPrice += $cart['product']->price * $cart['qty'];
            $totalDiscount += $cart['product']->discount * $cart['qty'];
        }
       return compact('totalPrice','totalDiscount');
    }
}
