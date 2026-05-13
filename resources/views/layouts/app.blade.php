<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRM Supermarket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background: #f1f5f9;
        }

        .sidebar{
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg,#15803d,#166534);
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px;
            color: white;
        }

        .sidebar h3{
            font-weight: 700;
            margin-bottom: 40px;
        }

        .sidebar a{
            display: block;
            padding: 14px 18px;
            color: white;
            text-decoration: none;
            border-radius: 14px;
            margin-bottom: 10px;
            transition: .3s;
            font-weight: 500;
        }

        .sidebar a:hover{
            background: rgba(255,255,255,.15);
        }

        .sidebar .active{
            background: rgba(255,255,255,.2);
        }

        .main-content{
            margin-left: 260px;
            padding: 30px;
        }

        .topbar{
            background: white;
            padding: 18px 25px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
            margin-bottom: 30px;
        }

        .card-dashboard{
            border: none;
            border-radius: 24px;
            color: white;
            overflow: hidden;
            position: relative;
        }

        .card-dashboard .icon{
            font-size: 60px;
            opacity: .3;
            position: absolute;
            right: 20px;
            bottom: 10px;
        }

        .card-dashboard h2{
            font-size: 35px;
            font-weight: 700;
        }

        .bg-blue{
            background: linear-gradient(135deg,#2563eb,#3b82f6);
        }

        .bg-green{
            background: linear-gradient(135deg,#16a34a,#22c55e);
        }

        .bg-orange{
            background: linear-gradient(135deg,#ea580c,#f97316);
        }

        .bg-red{
            background: linear-gradient(135deg,#dc2626,#ef4444);
        }

        .chart-card{
            background: white;
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
        }

        .table-card{
            background: white;
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
        }

        .logout-btn{
            position: absolute;
            bottom: 30px;
            width: 80%;
        }

    </style>

</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h3>🛒 CRM Market</h3>

    <a href="{{ route('dashboard') }}" class="active">
        📊 Dashboard
    </a>

    <a href="{{ route('customers.index') }}">
        👥 Customers
    </a>

    <a href="{{ route('produks.index') }}">
        📦 Produk
    </a>

    <a href="{{ route('penjualan.index') }}">
        🛒 Penjualan
    </a>

    <a href="{{ route('pengembalian.index') }}">
        🔄 Pengembalian
    </a>

    <!-- IMPORT KAGGLE -->
    <a href="/import">
        📂 Import Kaggle
    </a>

    <form method="POST"
        action="{{ route('logout') }}"
        class="logout-btn">

        @csrf

        <button class="btn btn-light w-100 rounded-4">
            Logout
        </button>

    </form>

</div>

<!-- MAIN -->
<div class="main-content">

    <!-- TOPBAR -->
    <div class="topbar d-flex justify-content-between align-items-center">

        <div>
            <h4 class="fw-bold mb-0">
                CRM Supermarket Dashboard
            </h4>

            <small class="text-muted">
                Monitoring supermarket realtime
            </small>
        </div>

        <div>
            <span class="badge bg-success p-2">
                {{ auth()->user()->name }}
            </span>
        </div>

    </div>

    @yield('content')

</div>

</body>
</html>
