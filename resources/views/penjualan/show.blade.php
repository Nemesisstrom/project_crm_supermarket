@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Detail Penjualan</h1>

<p><b>Customer:</b> {{ $penjualan->customer->nama ?? '-' }}</p>
<p><b>Total:</b> Rp {{ number_format($penjualan->total) }}</p>

<table class="w-full mt-3 border bg-white">
<tr class="bg-gray-200">
    <th>Produk</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Subtotal</th>
</tr>

@foreach($penjualan->details as $d)
<tr class="text-center border">
    <td>{{ $d->product->name ?? '-' }}</td>
    <td>{{ $d->qty }}</td>
    <td>Rp {{ number_format($d->price) }}</td>
    <td>Rp {{ number_format($d->subtotal) }}</td>
</tr>
@endforeach

</table>

<a href="{{ route('penjualan.index') }}" class="text-blue-500 mt-4 inline-block">
    ← Kembali
</a>

@endsection