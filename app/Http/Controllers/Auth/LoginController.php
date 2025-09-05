<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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

    public function post(LoginPostRequest $request)
    {
        $user = User::query()
            ->where('phone',$request->input('phone'))
            ->first();

        if(!Hash::check($request->input('password'),$user->password)){
            return backWithError('اطلاعات وارد شده نامعتبراست.');
        }

        return redirect()->route('auth.otp.index');

    }
}
