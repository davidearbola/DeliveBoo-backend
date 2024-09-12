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

        $earliestOrder = Order::orderBy('created_at', 'asc')->first();
        $mesiNumero = [];
        $mesiNome = [];

        $earliestMonth = Carbon::parse($earliestOrder->created_at)->format('m');
        $earliestYear = Carbon::parse($earliestOrder->created_at)->format('Y');
        $currentMonth = date('m');
        $currentYear = date('Y');

        for ($year = $earliestYear; $year <= $currentYear; $year++) {
            $startMonth = ($year == $earliestYear) ? $earliestMonth : 1;
            $endMonth = ($year == $currentYear) ? $currentMonth : 12;
            for ($month = $startMonth; $month <= $endMonth; $month++) {
                $mesiNumero[] = str_pad($month, 2, '0', STR_PAD_LEFT);
                if (str_pad($month, 2, '0', STR_PAD_LEFT) == '01') {
                    $mesiNome[] = 'Gennaio';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '02') {
                    $mesiNome[] = 'Febbraio';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '03') {
                    $mesiNome[] = 'Marzo';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '04') {
                    $mesiNome[] = 'Aprile';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '05') {
                    $mesiNome[] = 'Maggio';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '06') {
                    $mesiNome[] = 'Giugno';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '07') {
                    $mesiNome[] = 'Luglio';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '08') {
                    $mesiNome[] = 'Agosto';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '09') {
                    $mesiNome[] = 'Settembre';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '10') {
                    $mesiNome[] = 'Ottobre';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '11') {
                    $mesiNome[] = 'Novembre';
                } elseif (str_pad($month, 2, '0', STR_PAD_LEFT) == '12') {
                    $mesiNome[] = 'Dicembre';
                }
            }
        }

        $revenueByMonth = [];
        foreach ($mesiNumero as $month) {
            $ordersInMonth = Order::whereMonth('created_at', '=', $month)->get();
            $revenueByMonth[] = $ordersInMonth->sum('total_price');
        }

        $totalIncome = array_sum($revenueByMonth);
        return view('admin.stats.index', compact('revenueByMonth', 'mesiNome','totalIncome'));
    }
}
