<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\Order;
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

        try {
            $order->status = $request->input('status');
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
