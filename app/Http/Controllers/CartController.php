<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Http\Requests\cartUpdateQtyRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $title = 'سبدخرید';
        $userCartItems = getCartProducts();
        $cartInfo = getCartInfo();

        $totalPrice = $cartInfo['totalPrice'];
        $totalDiscount = $cartInfo['totalDiscount'];

        return view('cart',compact('title','userCartItems','totalPrice','totalDiscount'));
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

        $newQty = $request->input('qty');

        if (isset($currentUserCart[$request->input('product_id')])){
            $newQty += $currentUserCart[$request->input('product_id')]['qty'];
        }

        $currentUserCart[$request->input('product_id')]=[
            'product_id'=> $request->input('product_id'),
            'qty'=> $newQty
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

    public function updateQty(cartUpdateQtyRequest $request)
    {
        $currentUserCart = session('user_cart',[]);

        $requestQty = $request->input('qty');

        foreach ($currentUserCart as $productId => $cartItem){
            $currentUserCart[$productId]['qty'] = $requestQty[$productId]['qty'];
        }

        session([
            'user_cart'=>$currentUserCart
        ]);

        return redirect()->route('cart.index');
    }
}
