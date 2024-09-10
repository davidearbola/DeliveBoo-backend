<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->orderByDesc('id')->paginate(7);
        $totalOrders = Order::all();
        return view('admin.orders.index', compact('orders', 'totalOrders'));
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
