<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->orderByDesc('creates_at')
            ->paginate();

        $productsCount = $products->total();

        return view('Product.index',[
            'title'=>'محصولات',
            'products'=>$products,
            'productsCount'=>$productsCount
        ]);
    }

    public function show(int $productId)
    {
        $product = Product::query()
            ->where('id',$productId)
            ->with('category')
            ->firstOrFail();

        return view('Product.show',[
            'title'=> $product->name,
            'product'=>$product
        ]);
    }
}
