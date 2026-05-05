@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Edit Produk</h1>

<form action="{{ route('produks.update', $produk->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $produk->name }}" class="border p-2 w-full mb-2">
<input type="number" name="price" value="{{ $produk->price }}" class="border p-2 w-full mb-2">
<input type="number" name="stock" value="{{ $produk->stock }}" class="border p-2 w-full mb-2">

<button class="bg-blue-500 text-white px-4 py-2 rounded">
    Update
</button>

</form>

@endsection