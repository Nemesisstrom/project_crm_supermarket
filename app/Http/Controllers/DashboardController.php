<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Pengembalian;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function customer()
    {
        return view('dashboard.customer');
    } 

    public function index()
    {
        $totalCustomer = Customer::count();

        $totalProduk = Produk::count();

        $totalPenjualan = Penjualan::count();

        $totalPengembalian = Pengembalian::count();

        $totalRevenue = Penjualan::sum('total');

        $latestSales = Penjualan::with('customer')
                            ->latest()
                            ->take(5)
                            ->get();

        return view('dashboard', compact(
            'totalCustomer',
            'totalProduk',
            'totalPenjualan',
            'totalPengembalian',
            'totalRevenue',
            'latestSales'
        ));
    }
}
