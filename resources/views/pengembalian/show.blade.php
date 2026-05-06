@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Pengembalian</h3>

    <p><strong>Customer:</strong> {{ $pengembalian->customer->nama }}</p>
    <p><strong>Tanggal:</strong> {{ $pengembalian->tanggal }}</p>
    <p><strong>Status:</strong> 
        @if($pengembalian->status == 'pending')
            <span class="badge bg-warning">Pending</span>
        @else
            <span class="badge bg-success">Approved</span>
        @endif
    </p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pengembalian->details as $detail)
            <tr>
                <td>{{ $detail->product->name }}</td>
                <td>{{ $detail->qty }}</td>
                <td>Rp {{ number_format($detail->price) }}</td>
                <td>Rp {{ number_format($detail->subtotal) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h5>Total: Rp {{ number_format($pengembalian->total) }}</h5>

    <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection