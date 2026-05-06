<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomer   = Customer::query()->count();
        $totalProduk     = Produk::query()->count();
        $totalPenjualan  = Penjualan::query()->count();
        $totalRevenue    = Penjualan::query()->sum('total');

        return view('dashboard', compact(
            'totalCustomer',
            'totalProduk',
            'totalPenjualan',
            'totalRevenue'
        ));
    }
}
