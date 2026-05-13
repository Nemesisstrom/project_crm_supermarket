@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Data Penjualan</h1>

<a href="{{ route('penjualan.create') }}" class="bg-blue-500 text-black px-3 py-2 rounded">
    + Transaksi
</a>

<table class="w-full mt-4 border bg-white">
    <tr class="bg-gray-200">
        <th>ID</th>
        <th>Customer</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    @foreach($penjualans as $p)
    <tr class="text-center border">
        <td>{{ $p->id }}</td>
        <td>{{ $p->customer->nama ?? '-' }}</td>
        <td>Rp {{ number_format($p->total) }}</td>
        <td>

            {{-- ✅ DETAIL (WAJIB ADA ID) --}}
            <a href="{{ route('penjualan.show', $p->id) }}" class="text-green-600">
                Detail
            </a>

            |

            {{-- ✅ DELETE (WAJIB ADA ID) --}}
            <form action="{{ route('penjualan.destroy', $p->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus transaksi?')" class="text-red-600">
                    Hapus
                </button>
            </form>

        </td>
    </tr>
    @endforeach

</table>

<div class="mt-4">
    {{ $penjualans->links() }}
</div>

@endsection