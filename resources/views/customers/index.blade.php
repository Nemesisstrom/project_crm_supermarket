@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Customers</h1>

<a href="{{ route('customers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>

<table class="w-full mt-4 bg-white shadow rounded">
    <tr class="bg-gray-200">
        <th>Nama</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Aksi</th>
    </tr>

    @foreach($customers as $c)
    <tr class="text-center border-t">
        <td>{{ $c->nama }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
        <td>
            <a href="{{ route('customers.edit',$c->id) }}" class="text-blue-500">Edit</a>
            |
            <form action="{{ route('customers.destroy',$c->id) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Hapus?')" class="text-red-500">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection