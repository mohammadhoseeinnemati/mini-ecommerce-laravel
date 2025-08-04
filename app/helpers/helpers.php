<?php

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
