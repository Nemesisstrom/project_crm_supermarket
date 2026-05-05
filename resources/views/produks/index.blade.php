@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Data Produk</h1>

<a href="{{ route('produks.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded">
    + Tambah Produk
</a>

<table class="w-full mt-4 border bg-white">
    <tr class="bg-gray-200">
        <th class="p-2">Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach($produks as $produk)
    <tr class="text-center border">
        <td class="p-2">{{ $produk->name }}</td>
        <td>Rp {{ number_format($produk->price) }}</td>
        <td>{{ $produk->stock }}</td>
        <td>
            <a href="{{ route('produks.show', $produk->id) }}" class="text-green-600">Detail</a> |
            <a href="{{ route('produks.edit', $produk->id) }}" class="text-blue-600">Edit</a> |

            <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus?')" class="text-red-600">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="mt-4">
    {{ $produks->links() }}
</div>

@endsection