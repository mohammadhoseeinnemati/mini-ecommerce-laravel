<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfilePostRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('account.layouts.profile',[
           'title'=>'حساب کاربری | پروفایل',
            'withoutFooter'=>true
        ]);
    }

    public function post(ProfilePostRequest $request)
    {

    }
}
