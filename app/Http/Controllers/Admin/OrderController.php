<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminStatus;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Doctrine\DBAL\Query;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'مدیریت سفارشات';

        $orders = Order::query()
            ->with('user')
            ->applySearch()
            ->applySort()
            ->paginate()
            ->withQueryString();

        return view('admin.orders.index', compact('title', 'orders'));
    }

    public function show(int $orderId)
    {

        $title = 'جزییات سفارش';

        $orders = Order::query()
            ->where('id',$orderId)
            ->with([
                'user',
                'orderItems.product'
            ])
            ->firstOrFail();

        return view('admin.orders.show',compact('title','orders'));
    }

    public function edit(int $orderId)
    {
        $order = Order::findOrFail($orderId);

        $title = 'ویرایش سفارش';

        return view('admin.orders.edit', compact('title','order'));
    }

    public function update(OrderUpdateRequest $request, int $userId)
    {
        $order = Order::findOrFail($userId);

        if($order->status == OrderStatus::cancelled){
            return backWithError('وضعیت قابل تغییر نیست');
        }

        try {
            $status = AdminStatus::from($request->input('status'));

            if($status == OrderStatus::cancelled){
                $orderItems = OrderItem::query()
                    ->where('order_id', $order->id)
                    ->get();

                foreach ($orderItems as $orderItem){
                    Product::query()
                        ->where('id', $orderItem->product_id)
                        ->increment('qty', $orderItem->qty);
                }
            }

            $order->status = $status;
            $order->save();
        }catch (Exception $exception){
            Log::error($exception);

            return backWithError();
        }

        return redirect()->route('admin.orders.index');
    }

    public function delete(int $userId)
    {
        $order = Order::findOrFail($userId);

        try {
            $order->delete();
        }catch (Exception $exception){
            Log::error($exception);

            return backWithError();
        }

        return redirect()->route('admin.orders.index');
    }
}
