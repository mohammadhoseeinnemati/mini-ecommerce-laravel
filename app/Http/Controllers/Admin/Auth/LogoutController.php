<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {

        Auth::guard('admin')->logout();

        return redirect()->route('admin.auth.login.index');
    }
}
