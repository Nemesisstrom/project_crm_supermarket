@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Tambah Produk</h1>

<form action="{{ route('produks.store') }}" method="POST">
@csrf

<input type="text" name="nama" placeholder="Nama Produk" class="border p-2 w-full mb-2">
<input type="number" name="harga" placeholder="Harga" class="border p-2 w-full mb-2">
<input type="number" name="stok" placeholder="Stok" class="border p-2 w-full mb-2">

<button class="bg-green-500 text-white px-4 py-2 rounded">
    Simpan
</button>

</form>

@endsection