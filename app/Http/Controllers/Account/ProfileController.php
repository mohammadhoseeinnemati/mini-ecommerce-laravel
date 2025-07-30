<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfilePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ProfileController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        return view('account.layouts.profile',[
           'title'=>'حساب کاربری | پروفایل',
            'withoutFooter'=>true,
            'user'=>$user
        ]);
    }

    public function post(ProfilePostRequest $request)
    {

    }
}
