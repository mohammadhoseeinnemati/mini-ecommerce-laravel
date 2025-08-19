<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->limit(10)
            ->get();

        return view('index',[
            'title'=>'صفحه اصلی',
            'categories'=>$categories
        ]);
    }
}
