@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Pengembalian</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pengembalian as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->customer->nama }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>Rp {{ number_format($item->total) }}</td>
                <td>
                    @if($item->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @else
                        <span class="badge bg-success">Approved</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('pengembalian.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>

                    @if($item->status == 'pending')
                        <form action="{{ route('pengembalian.approve', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-success btn-sm">Approve</button>
                        </form>

                        <form action="{{ route('pengembalian.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $pengembalian->links() }}
</div>
@endsection