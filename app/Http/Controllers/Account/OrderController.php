<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('account.order',[
           'title'=>'حساب کاربری | محصولات',
            'withoutFooter'=>true
        ]);
    }
}
