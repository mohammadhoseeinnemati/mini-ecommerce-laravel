<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductIndexRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request)
    {

        $products = Product::query()
            ->orderByDesc('creates_at')
            ->paginate();

        $categories = Category::query()
            ->whereHas('products')
            ->get();

        $productsCount = $products->total();

        return view('Product.index',[
            'title'=>'محصولات',
            'products'=>$products,
            'productsCount'=>$productsCount,
            'categories'=> $categories
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
