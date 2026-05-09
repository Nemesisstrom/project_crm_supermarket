@extends('layouts.app')

@section('content')

<div class="row">

    <!-- CUSTOMER -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard bg-blue shadow-lg">
            <div class="card-body">

                <h6>Total Customer</h6>

                <h2>
                    {{ $totalCustomer }}
                </h2>

                <div class="icon">
                    👥
                </div>

            </div>
        </div>

    </div>

    <!-- PRODUK -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard bg-green shadow-lg">
            <div class="card-body">

                <h6>Total Produk</h6>

                <h2>
                    {{ $totalProduk }}
                </h2>

                <div class="icon">
                    📦
                </div>

            </div>
        </div>

    </div>

    <!-- PENJUALAN -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard bg-orange shadow-lg">
            <div class="card-body">

                <h6>Total Penjualan</h6>

                <h2>
                    {{ $totalPenjualan }}
                </h2>

                <div class="icon">
                    🛒
                </div>

            </div>
        </div>

    </div>

    <!-- RETUR -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard bg-red shadow-lg">
            <div class="card-body">

                <h6>Total Retur</h6>

                <h2>
                    {{ $totalPengembalian }}
                </h2>

                <div class="icon">
                    🔄
                </div>

            </div>
        </div>

    </div>

</div>

<!-- REVENUE -->
<div class="row">

    <div class="col-md-8 mb-4">

        <div class="chart-card">

            <div class="d-flex justify-content-between mb-4">

                <div>
                    <h5 class="fw-bold">
                        Revenue Analytics
                    </h5>

                    <small class="text-muted">
                        Statistik penjualan supermarket
                    </small>
                </div>

                <div>
                    <span class="badge bg-success">
                        Rp {{ number_format($totalRevenue,0,',','.') }}
                    </span>
                </div>

            </div>

            <canvas id="salesChart"></canvas>

        </div>

    </div>

    <!-- INFO -->
    <div class="col-md-4 mb-4">

        <div class="table-card">

            <h5 class="fw-bold mb-4">
                🏪 Sistem Aktif
            </h5>

            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    ✔️ CRM Supermarket
                </li>

                <li class="list-group-item">
                    ✔️ Monitoring Stok
                </li>

                <li class="list-group-item">
                    ✔️ Dashboard Analytics
                </li>

                <li class="list-group-item">
                    ✔️ Sistem Retur
                </li>

                <li class="list-group-item">
                    ✔️ Manajemen Customer
                </li>

            </ul>

        </div>

    </div>

</div>

<!-- TABLE -->
<div class="table-card">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h5 class="fw-bold">
                Transaksi Terbaru
            </h5>
        </div>

    </div>

    <table class="table table-hover">

        <thead>

            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>

        </thead>

        <tbody>

            @foreach($latestSales as $sale)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ $sale->customer->nama }}
                </td>

                <td>
                    {{ $sale->tanggal }}
                </td>

                <td class="fw-bold text-success">
                    Rp {{ number_format($sale->total,0,',','.') }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<script>

const ctx = document.getElementById('salesChart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],

        datasets: [{

            label: 'Penjualan',

            data: [1200000,1900000,3000000,2500000,4200000,5100000],

            borderWidth: 3,

            tension: .4

        }]
    }

});

</script>

@endsection
