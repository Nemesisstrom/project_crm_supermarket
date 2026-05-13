@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Edit Produk</h1>

<form action="{{ route('produks.update', $produk->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="border p-2 w-full mb-2">
<input type="number" name="harga" value="{{ $produk->harga }}" class="border p-2 w-full mb-2">
    <div class="mb-3">

        <label>Mata Uang</label>

        <select name="currency"
                class="form-control">

            <option value="IDR">Rupiah</option>
            <option value="USD">Dollar</option>
            <option value="EUR">Euro</option>

        </select>

    </div>
<input type="number" name="stok" value="{{ $produk->stok }}" class="border p-2 w-full mb-2">

<button class="bg-blue-500 text-blue px-4 py-2 rounded">
    Update
</button>

</form>

@endsection