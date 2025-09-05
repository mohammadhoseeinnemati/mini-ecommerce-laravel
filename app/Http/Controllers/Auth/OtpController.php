<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OtpRequest;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OtpController extends Controller
{
    public function index()
    {
        $user = User::firstOrFail();


        $existingOtp = Otp::query()
            ->where('user_id', $user->id)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();


        if (!$existingOtp) {
            $otpCode = random_int(1000, 9999);

            $apiKey = config('services.melipayamak.api_key');
            $from   = config('services.melipayamak.from');
            $to     = $user->phone;
            $text   = "کد ورود شما: $otpCode";

            $response = Http::withOptions([
                'verify' => base_path('certs/cacert.pem'),
            ])->post(config('services.melipayamak.url')."/{$apiKey}", [
                'from' => $from,
                'to'   => $to,
                'text' => $text,
            ]);


            Otp::create([
                'user_id'    => $user->id,
                'code'       => $otpCode,
                'expires_at' => now()->addMinutes(3),
            ]);
        }

        session(['user-otp' => $user->id]);

        return view('auth.Otp', [
            'withoutHeader' => true,
            'withoutFooter' => true,
            'title' => 'کد ورود'
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
