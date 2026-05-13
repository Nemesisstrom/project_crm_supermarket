@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Data Customer</h1>

<a href="{{ route('customers.create') }}" class="bg-blue-500 text-black px-3 py-2">Tambah</a>

<table class="w-full mt-4 border">
    <tr class="bg-gray-200">
        <th>Nama</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Aksi</th>
    </tr>

    @foreach($customers as $customer)
    <tr class="text-center border">
        <td>{{ $customer->nama }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        <td>
            <a href="{{ route('customers.show', $customer->id) }}">Detail</a> |
            <a href="{{ route('customers.edit', $customer->id) }}">Edit</a> |

            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection