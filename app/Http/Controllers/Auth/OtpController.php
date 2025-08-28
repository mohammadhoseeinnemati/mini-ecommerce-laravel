<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OtpRequest;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function index()
    {
        return view('auth.Otp',[
            'withoutHeader'=>true,
            'withoutFooter'=>true,
            'title'=>'کد ورود'
        ]);
    }

    public function otp(OtpRequest $request)
    {
        $code = implode('', $request->input('code'));


        $userId = session('user-otp');

        $otp = Otp::query()
            ->where('user_id', $userId)
            ->where('code',$code)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();


        if (!$otp) {
            return backWithError( 'کد وارد شده معتبر نیست یا منقضی شده است.');
        }

        $user = User::find($userId);
        Auth::login($user);

        $otp->delete();

        return redirect()->route('index');
    }
}
