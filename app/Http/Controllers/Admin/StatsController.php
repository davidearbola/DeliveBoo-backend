<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;

        $years = Order::where('restaurant_id', $restaurant->id)
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year')
            ->toArray();

        $selectedYear = $request->input('year', date('Y'));

        $ordersInYear = Order::where('restaurant_id', $restaurant->id)
            ->whereYear('created_at', $selectedYear)
            ->get();

        $mesiNumero = [];
        $mesiNome = [];
        for ($month = 1; $month <= 12; $month++) {
            $mesiNumero[] = str_pad($month, 2, '0', STR_PAD_LEFT);
            $mesiNome[] = Carbon::create()->month($month)->locale('it')->monthName;
        }

        $revenueByMonth = [];
        foreach ($mesiNumero as $month) {
            $ordersInMonth = $ordersInYear->filter(function ($order) use ($month) {
                return Carbon::parse($order->created_at)->format('m') == $month;
            });
            $revenueByMonth[] = $ordersInMonth->sum('total_price');
        }

        $totalIncome = array_sum($revenueByMonth);
        $existData = $ordersInYear->isNotEmpty();

        $productsData = Product::whereHas('orders', function ($query) use ($restaurant) {
            $query->where('orders.restaurant_id', $restaurant->id); // Usa il prefisso 'orders.' per riferirsi alla tabella 'orders'
        })->withSum(['orders as total_quantity' => function ($query) use ($restaurant) {
            $query->where('orders.restaurant_id', $restaurant->id);
        }], 'order_product.quantity')->get();

        // Prepara i dati per il grafico dei prodotti
        $productNames = $productsData->pluck('name')->toArray();
        $productQuantities = $productsData->pluck('total_quantity')->toArray();

        return view('admin.stats.index', compact(
            'revenueByMonth',
            'mesiNome',
            'totalIncome',
            'existData',
            'years',
            'selectedYear',
            'productNames',
            'productQuantities'
        ));
    }
}
