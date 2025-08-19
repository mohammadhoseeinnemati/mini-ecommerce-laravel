<?php

namespace App\Services;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Builder;

class ProductFilterHandlerServices
{
    protected Builder $QueryBuilder;

    protected mixed $request;

    public function __construct(Builder $QueryBuilder, mixed $request)
    {
        $this->QueryBuilder = $QueryBuilder;
        $this->request = $request;
    }

    public function applyFilter()
    {
        $request = $this->request;

        $this->QueryBuilder
            ->when($request->filled('category_id'), function (Builder $Query) use ($request) {
                $Query->whereIn('category_id', $request->input('category_id'));
            })
            ->when($request->filled('keyword'), function (Builder $Query) use ($request) {
                $keyword = $request->input('keyword');

                $Query->whereAny([
                    'name',
                    'name_en'
                ],'LIKE',"%$keyword%");
            })
            ->when($request->filled('exists'), function (Builder $Query) use ($request) {
                $Query->where('qty', '>', 0);
            });
    }

    public function applySort()
    {
        $request = $this->request;

        $this->QueryBuilder
            ->when($request->filled('sort'), function (Builder $Query) use ($request) {
                switch ($request->input('sort')) {
                    case 'most_wanted';
                        $Query->withSum([
                            'orderItems' => function (Builder $Query) {
                                $Query->whereHas('order', function (Builder $Query) {
                                    $Query->whereIn('status', [
                                        OrderStatus::delivered,
                                        OrderStatus::sent
                                    ]);
                                });
                            }

                        ], 'qty')
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
            ->unless($request->filled('sort'), function (Builder $Query) {
                $Query->orderByDesc('creates_at');
            });
    }
}
