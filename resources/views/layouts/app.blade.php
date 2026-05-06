<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRM Supermarket</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

<div class="flex">

    {{-- SIDEBAR --}}
    <div class="w-64 bg-gray-900 text-white min-h-screen p-4">
        <h1 class="text-xl font-bold mb-6">CRM Supermarket</h1>

        <ul class="space-y-3">
            <li><a href="{{ route('dashboard') }}" class="block hover:text-yellow-400">Dashboard</a></li>
            <li><a href="{{ route('customers.index') }}" class="block hover:text-yellow-400">Customer</a></li>
            <li><a href="{{ route('produks.index') }}" class="block hover:text-yellow-400">Produk</a></li>
            <li><a href="{{ route('penjualan.index') }}" class="block hover:text-yellow-400">Penjualan</a></li>
        </ul>
    </div>

    {{-- CONTENT --}}
    <div class="flex-1 p-6">
        @yield('content')
    </div>

</div>

</body>
</html>
