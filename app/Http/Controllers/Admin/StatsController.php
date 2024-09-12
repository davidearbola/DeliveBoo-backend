<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalOrders = Order::all();

        $earliestOrder = Order::orderBy('created_at', 'asc')->first();
        $mesiNumero = [];

        $earliestMonth = Carbon::parse($earliestOrder->created_at)->format('m');
        $earliestYear = Carbon::parse($earliestOrder->created_at)->format('Y');
        $currentMonth = date('m');
        $currentYear = date('Y');

        for ($year = $earliestYear; $year <= $currentYear; $year++) {
            $startMonth = ($year == $earliestYear) ? $earliestMonth : 1;
            $endMonth = ($year == $currentYear) ? $currentMonth : 12;
            for ($month = $startMonth; $month <= $endMonth; $month++) {
                $mesiNumero[] = str_pad($month, 2, '0', STR_PAD_LEFT);
            }
        }

        $revenueByMonth = [];
        foreach ($mesiNumero as $month) {
            $ordersInMonth = Order::whereMonth('created_at', '=', $month)->get();
            $totalRevenueInMonth = $ordersInMonth->sum('total_price');
            $revenueByMonth[$month] = $totalRevenueInMonth;
        }
        
        return view('admin.stats.index', compact('totalOrders', 'revenueByMonth', 'mesiNumero'));
    }
}