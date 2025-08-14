<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
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
            ->when($request->filled('sort'),function (Builder $Query) use ($request){
                switch ($request->input('sort')){
                    case 'most_wanted';
                        $Query->withSum([
                            'orderItems'=> function (Builder $Query) {
                                $Query->whereHas('order',function (Builder $Query){
                                    $Query->whereIn('status',[
                                       OrderStatus::delivered,
                                       OrderStatus::sent
                                    ]);
                                });
                            }

                        ],'qty')
                            ->orderByDesc('order_items_sum_qty');
                    break;

                    case 'lowest';
                        $Query->orderBy('price');
                    break;

                    case 'highest';
                        $Query->orderByDesc('price');
                    break;

                    default:
                        $Query->orderByDesc('creates_at');
                    break;
                }
            })
            ->unless($request->filled('sort'),function (Builder $Query){
                $Query->orderByDesc('creates_at');
            })
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
