@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

{{-- CARD --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-4">

    {{-- CUSTOMER --}}
    <div class="bg-blue-500 text-white p-4 rounded shadow">
        <h2 class="text-lg">Total Customer</h2>
        <p class="text-2xl font-bold">{{ $totalCustomer }}</p>
    </div>

    {{-- PRODUK --}}
    <div class="bg-green-500 text-white p-4 rounded shadow">
        <h2 class="text-lg">Total Produk</h2>
        <p class="text-2xl font-bold">{{ $totalProduk }}</p>
    </div>

    {{-- PENJUALAN --}}
    <div class="bg-yellow-500 text-white p-4 rounded shadow">
        <h2 class="text-lg">Total Transaksi</h2>
        <p class="text-2xl font-bold">{{ $totalPenjualan }}</p>
    </div>

    {{-- REVENUE --}}
    <div class="bg-red-500 text-white p-4 rounded shadow">
        <h2 class="text-lg">Total Revenue</h2>
        <p class="text-2xl font-bold">
            Rp {{ number_format($totalRevenue) }}
        </p>
    </div>

</div>

@endsection
