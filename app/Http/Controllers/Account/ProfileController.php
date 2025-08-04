<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfilePostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
        $inputs = $request
            ->only([
                'first_name',
                'last_name',
                'email',
                'phone',
            ]);

        if ($request->filled('password')){
            $inputs['password'] = Hash::make($request->input('password'));
        }

        try {
            User::query()
                ->where('id','=',Auth::id())
                ->update($inputs);
        }catch (\Exception $exception){
            Log::error($exception);

            return backWithError('خطا در ذخیره اطلاعات حساب کاربری');
        }

        return back()->with('success', 'اطلاعات با موفقیت ثبت شد');
    }
}
