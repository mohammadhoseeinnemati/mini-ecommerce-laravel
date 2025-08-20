<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\AdminStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginPostRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login',[
            'rowLayout' => true,
            'authLayout' => true
        ]);
    }

    public function post(LoginPostRequest $request)
    {
        $inputs = $request->validated();

        $admins = Admin::query()
            ->where([
               'email' => $inputs['email'],
               'status' => AdminStatus::Enable
            ])
            ->first();


        if (!$admins){
            return backWithError('اطلاعات وارد شده نامعتبر است');
        }

        if (!Hash::check($inputs['password'], $admins->password)){
            return backWithError('اطلاعات وارد شده نامعتبر است');
        }

        Auth::guard('admin')->login($admins);

        return redirect()->route('admin.dashboard');
    }
}
