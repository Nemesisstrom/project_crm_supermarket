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
        $totalCustomer = Customer::count();
        $totalProduk = Produk::count();
        $totalPenjualan = Penjualan::count();
        $totalPengembalian = Pengembalian::count();

        $totalRevenue = Penjualan::sum('total');

        return view('dashboard', compact(
            'totalCustomer',
            'totalProduk',
            'totalPenjualan',
            'totalPengembalian',
            'totalRevenue'
        ));
    }
}
