@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4 ">Tambah Produk</h1>

<form action="{{ route('produks.store') }}" method="POST">
@csrf
 
    <div class="mb-3">

        <label>Mata Uang</label>

        <select name="currency"
                class="form-control">

            <option value="IDR">Rupiah</option>
            <option value="USD">Dollar</option>
            <option value="EUR">Euro</option>

        </select>

    </div>

<input type="text" name="nama_produk" placeholder="Nama Produk" class="border p-2 w-full mb-2">
<input type="number" name="harga" placeholder="Harga" class="border p-2 w-full mb-2">
<input type="number" name="stok" placeholder="Stok" class="border p-2 w-full mb-2">

<button class="bg-green-500 text-green px-4 py-2 rounded">
    Simpan
</button>

</form>

@endsection