<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class StatsController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->orderByDesc('id')->paginate(7);
        $totalOrders = Order::all();

        
        $set = Order::whereMonth('created_at', '=', '09')->get();
        $totalPriceSett = $set->sum('total_price');
        

        return view('admin.stats.index', compact('orders', 'totalOrders','totalPriceSett'));
    }
}
