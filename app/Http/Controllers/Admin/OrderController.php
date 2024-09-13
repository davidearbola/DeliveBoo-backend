<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $orders = Order::where('restaurant_id', $restaurant->id)->with('products')->orderByDesc('created_at')->paginate(7);
        $totalOrders = Order::where('restaurant_id', $restaurant->id)->get();
        return view('admin.orders.index', compact('orders', 'totalOrders'));
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
