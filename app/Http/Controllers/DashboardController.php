<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomer = Customer::count();
        $totalProduk = Produk::count();
        $totalPenjualan = Penjualan::count();

        $totalRevenue = Penjualan::sum('total');

        // 📈 Penjualan per bulan
        $monthlySales = Penjualan::select(
                DB::raw('MONTH(date) as bulan'),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('bulan')
            ->get();

        return response()->json([
            'total_customer' => $totalCustomer,
            'total_product' => $totalProduk,
            'total_sales' => $totaPenjualan,
            'total_revenue' => $totalRevenue,
            'monthly_sales' => $monthlySales
        ]);
    }
}
