<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('user_id','=', Auth::id())
            ->with('orderItems.product')
            ->limit(10)
            ->get();

        return view('account.order',[
           'title'=>'حساب کاربری | محصولات',
            'withoutFooter'=>true,
            'orders'=>$orders
        ]);
    }
}
