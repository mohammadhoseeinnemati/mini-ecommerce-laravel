<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\CheckoutPostRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $title = 'تسویه حساب';
        $userCartItems = getCartProducts();
        $cartInfo = getCartInfo();

        $totalPrice = $cartInfo['totalPrice'];
        $totalDiscount = $cartInfo['totalDiscount'];

        return view('checkout', compact('title', 'userCartItems', 'totalPrice', 'totalDiscount'));

    }

    public function post(CheckoutPostRequest $request)
    {
        $cartItems = getCartProducts();
        $inputs = $request->validated();
        $finalPrice = 0;

        // check product qty

        foreach ($cartItems as $cartItem) {
            $existsQty = Product::query()
                ->where('id', $cartItem['product_id'])
                ->where('qty', '>=', $cartItem['qty'])
                ->exists();

            if (!$existsQty) {
                return backWithError('موجودی محصول' . $cartItem['product']->name . 'به اتمام رسیده است. لطفا ان را در سبد خرید خود حذف کنید و مجدد اقدام به سفارش کنید');
            }
        }

        // create orders

        $order = Order::create(array_merge($inputs, [
            'user_id' => Auth::id(),
            'status' => OrderStatus::pending,
            'total_products' => count($cartItems),
            'total_price' => 0
        ]));

        // create order iteme

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                $totalPrice = $cartItem['product']->price * $cartItem['qty'],
                $totalDiscount = $cartItem['product']->discount * $cartItem['qty'],

                'order_id' => $order->id,
                'product_id' => $cartItem['product_id'],
                'qty' => $cartItem['qty'],
                'price' => $cartItem['product']->price,
                'total_price' => $totalPrice,
                'discount' => $cartItem['product']->discount,
                'total_discount' => $totalDiscount

            ]);

            Product::query()
                ->where('id',$cartItem['product_id'])
                ->decrement('qty',$cartItem['qty']);

            $finalPrice = $totalPrice - $totalDiscount;
        }

        // update order details

        $order->total_price = $finalPrice;
        $order->status = OrderStatus::processing;
        $order->save();

        // clear user cart items form session

        session()->forget('user_cart');

        return redirect()->route('account.orders.index');
    }
}
