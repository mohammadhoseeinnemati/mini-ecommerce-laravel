<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductIndexRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request)
    {
        $products = Product::query()
            ->when($request->filled('category_id'), function (Builder $Query) use ($request){
               $Query->whereIn('category_id', $request->input('category_id'));
            })
            ->when($request->filled('exists'), function (Builder $Query) use ($request){
                $Query->where('qty', '>', 0);
            })
            ->orderByDesc('creates_at')
            ->paginate();

        $categories = Category::query()
            ->whereHas('products')
            ->get();

        $filteredCategory = $request->input('category_id');

        $productsCount = $products->total();

        return view('Product.index', [
            'title' => 'محصولات',
            'products' => $products,
            'productsCount' => $productsCount,
            'categories' => $categories,
            'filteredCategory'=> $filteredCategory
        ]);
    }

    public function removeFilter(Request $request)
    {
        $inputs = $request->all();

        unset($inputs['category_id']);
        unset($inputs['exists']);

        return redirect()->route('products.index', $inputs);
    }

    public function show(int $productId)
    {
        $product = Product::query()
            ->where('id', $productId)
            ->with('category')
            ->firstOrFail();

        return view('Product.show', [
            'title' => $product->name,
            'product' => $product
        ]);
    }
}
