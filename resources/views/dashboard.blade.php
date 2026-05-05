@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="bg-white p-4 rounded shadow">
        <h2>Total Customer</h2>
        <p class="text-2xl">{{ $totalCustomer }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Total Produk</h2>
        <p class="text-2xl">{{ $totalProduk }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Total Penjualan</h2>
        <p class="text-2xl">{{ $totalPenjualan }}</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2>Total Revenue</h2>
        <p class="text-2xl">Rp {{ number_format($totalRevenue) }}</p>
    </div>
</div>

@endsection