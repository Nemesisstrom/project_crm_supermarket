<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomer = Customer::count();
        $totalProduk = Produk::count();
        $totalPenjualan = Penjualan::count();
        $totalRevenue = Penjualan::sum('total');

        $monthlySales = Penjualan::select(
                DB::raw('MONTH(tanggal) as bulan'),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view('dashboard', compact(
            'totalCustomer',
            'totalProduk',
            'totalPenjualan',
            'totalRevenue',
            'monthlySales'
        ));
    }
}