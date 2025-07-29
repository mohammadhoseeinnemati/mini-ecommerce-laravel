<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'صفحه ثبت نام',
            'withoutHeader' => true,
            'withoutFooter' => true
        ]);
    }

    public function post(RegisterPostRequest $request)
    {
        $input = $request->validated();

        $input['password'] = Hash::make($input['password']);

        try {
            $user = User::create($input);
        } catch (\Exception $exception) {
            Log::error($exception);

            return backWithError('خطادرثبت نام,لطفامجددتلاش کنید');
        }

        Auth::login($user);

        return redirect()->route('auth.login.index');
    }
}
