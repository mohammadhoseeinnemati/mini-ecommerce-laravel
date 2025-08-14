<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $title = 'سبدخرید';
        $userCartItems = session('user_cart',[]);

        foreach ($userCartItems as $productId => $cart){
            $userCartItems[$productId]['product'] = Product::find($productId);
        }

        return view('cart',compact('title','userCartItems'));
    }

    public function add(CartAddRequest $request)
    {
        $product = Product::query()
            ->where('id',$request->input('product_id'))
            ->where('qty','>=',$request->input('qty'))
            ->first();

        if (!$product){
            return backWithError('محصول انتخاب شده مجاز به اضافه کردن در سبد خرید نیست');
        }

        $currentUserCart = session('user_cart',[]);

        $currentUserCart[$request->input('product_id')]=[
            'product_id'=> $request->input('product_id'),
            'qty'=> $request->input('qty')
        ];

        session([
            'user_cart'=>$currentUserCart
        ]);

        return back();
    }

    public function remove(int $productId)
    {
        Product::findOrFail($productId);

        $currentUserCart = session('user_cart',[]);

        unset($currentUserCart[$productId]);

        session([
            'user_cart'=>$currentUserCart
        ]);

        return back();
    }

    public function clear()
    {
        session()->forget('user_cart');

        return back();
    }
}
