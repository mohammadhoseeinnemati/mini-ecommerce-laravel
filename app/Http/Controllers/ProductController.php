<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\ProductIndexRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductFilterHandlerServices;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request)
    {
        $productsQuery = Product::query();

        $filterHandler = new ProductFilterHandlerServices($productsQuery, $request);
        $filterHandler->applyFilter();
        $filterHandler->applySort();

        $products = $productsQuery
            ->paginate()
            ->withQueryString();

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
