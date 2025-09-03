<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->limit(10)
            ->get();

        $newestProducts = Product::query()
            ->where('qty', '>', 0)
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        $mostWantedProducts = Product::query()
            ->where('qty', '>', 0)
            ->withSum([
                'orderItems' => function (Builder $Query) {
                    $Query->whereHas('order', function (Builder $Query) {
                        $Query->whereIn('status', [
                            OrderStatus::delivered,
                            OrderStatus::sent
                        ]);
                    });
                }

            ], 'qty')
            ->orderByDesc('order_items_sum_qty')
            ->limit(10)
            ->get();

        return view('index', [
            'title' => 'صفحه اصلی',
            'categories' => $categories,
            'newestProducts'=>$newestProducts,
            'mostWantedProducts'=>$mostWantedProducts
        ]);
    }
}
