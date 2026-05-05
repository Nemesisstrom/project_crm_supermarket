@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Produk</h1>

<a href="{{ route('produks.create') }}" class="bg-blue-500 text-white px-4 py-2">Tambah</a>

<table class="w-full mt-4 bg-white">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach($products as $p)
    <tr class="text-center border">
        <td>{{ $p->name }}</td>
        <td>{{ $p->price }}</td>
        <td>{{ $p->stock }}</td>
        <td>
            <a href="{{ route('produks.edit',$p->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach

</table>

@endsection