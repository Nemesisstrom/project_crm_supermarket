@extends('layouts.app')

@section('content')

<h1 class="text-xl mb-4">Transaksi Penjualan</h1>

<form action="{{ route('penjualan.store') }}" method="POST">
@csrf

{{-- CUSTOMER --}}
<select name="customer_id" class="border p-2 w-full mb-3" required>
    <option value="">Pilih Customer</option>
    @foreach($customers as $c)
        <option value="{{ $c->id }}">{{ $c->nama }}</option>
    @endforeach
</select>

{{-- ITEM --}}
<div id="items">
    <div class="flex gap-2 mb-2">
        <select name="items[0][product_id]" class="border p-2" required>
            @foreach($products as $p)
                <option value="{{ $p->id }}">{{ $p->name }}</option>
            @endforeach
        </select>

        <input type="number" name="items[0][qty]" placeholder="Qty" class="border p-2" required>
    </div>
</div>

<button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
    Simpan
</button>

</form>

@endsection