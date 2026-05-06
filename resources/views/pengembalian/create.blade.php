@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Buat Retur</h3>

    <form action="{{ route('pengembalian.store') }}" method="POST">
        @csrf

        <input type="hidden" name="penjualan_id" value="{{ $penjualan->id }}">
        <input type="hidden" name="customer_id" value="{{ $penjualan->customer->id }}">

        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty Beli</th>
                    <th>Qty Retur</th>
                </tr>
            </thead>
            <tbody>
            @foreach($penjualan->details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->qty }}</td>
                    <td>
                        <input type="number" name="items[{{ $loop->index }}][qty]" min="0" max="{{ $detail->qty }}" class="form-control">

                        <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $detail->product->id }}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary">Simpan Retur</button>
    </form>
</div>
@endsection