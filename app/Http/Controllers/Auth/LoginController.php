<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.Login',[
            'title'=>'صفحه ورود',
            'withoutHeader'=>true,
            'withoutFooter'=>true
        ]);
    }

    public function post()
    {

    }
}
