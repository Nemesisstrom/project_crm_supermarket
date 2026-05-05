@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Detail Produk</h1>

<p><b>Nama:</b> {{ $produk->name }}</p>
<p><b>Harga:</b> Rp {{ number_format($produk->price) }}</p>
<p><b>Stok:</b> {{ $produk->stock }}</p>

<a href="{{ route('produks.index') }}" class="text-blue-500">Kembali</a>

@endsection