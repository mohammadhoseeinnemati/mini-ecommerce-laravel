<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function index()
    {
        return view('auth.Otp');
    }

    public function otp(Request $request)
    {

    }
}
