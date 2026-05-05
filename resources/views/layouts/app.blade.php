<!DOCTYPE html>
<html>
<head>
    <title>CRM Supermarket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">
    <!-- Sidebar -->
    <div class="w-64 bg-blue-900 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">CRM</h2>
        <ul>
            <li class="mb-3"><a href="/dashboard">Dashboard</a></li>
            <li class="mb-3"><a href="/customers">Customers</a></li>
            <li class="mb-3"><a href="/produks">Produks</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="flex-1 p-6">
        @if(session('success'))
            <div class="bg-green-200 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>

</body>
</html>