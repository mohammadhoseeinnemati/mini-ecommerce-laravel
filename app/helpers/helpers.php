<?php

use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

if(!function_exists('backWithError')){
    function backWithError(string $message = 'خطای رخ داده است'): RedirectResponse
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
    function activeSidebarItem(string|array $targetRouteNames, string $class = 'active'):string
    {
        $currentRouteName = Route::currentRouteName();

        $active = false;

        if(is_string($targetRouteNames)){
            $targetRouteNames = [$targetRouteNames];
        }

        foreach ($targetRouteNames as $targetRouteName){
            if ($active){
                break;
            }

            if ($targetRouteName == $currentRouteName){
                $active = true;
            }
        }

        return $active ? $class : "";
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

if(!function_exists('existsInRequest')){
    function existsInRequest(string $kay, string $value):bool
    {
        if(!request()->filled($kay)){
            return false;
        }

        return request()->input($kay) === $value;
    }
}

if(!function_exists('getUsersFullName')){
    function getUsersFullName(Admin|User $user):string
    {
       return $user->first_name. ' ' .$user->last_name;
    }
}

if(!function_exists('getSortSelected')){
    function getSortSelected(string $kay , bool $default = false):bool
    {
       if (request()->missing('sort') && $default){
           return true;
       }

       return request()->query('sort') == $kay;
    }
}


if(!function_exists('toJalaliDatetime')){
    function toJalaliDatetime(Carbon $datetime ):? string
    {
        return $datetime->toJalali()->format('H:i Y/m/d');
    }
}



if(!function_exists('convertEnumCasesToString')){
    function convertEnumCasesToString($enumClass ): string
    {
        $string = [];

        foreach ($enumClass::cases() as $case){
            $string[] = $case->value;
        }

        return implode(',',$string);
    }
}



if(!function_exists('getProductImageUrl')){
    function getProductImageUrl(?ProductImage $image): string
    {
        if(is_null($image)){
            return asset('assets/admin/images/product-default-image.png');
        }

        $file =$image->file;

        return \Illuminate\Support\Facades\Storage::url($file->path);

    }
}
