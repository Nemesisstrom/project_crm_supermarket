<!DOCTYPE html>
<html>
<head>
    <title>Login CRM Supermarket</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .login-box {

            width: 400px;

            margin: 80px auto;

            background: white;

            padding: 30px;

            border-radius: 10px;

            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .login-box h2 {

            text-align: center;

            margin-bottom: 20px;
        }

        .form-control {

            width: 100%;

            padding: 10px;

            margin-bottom: 15px;

            border: 1px solid #ccc;

            border-radius: 5px;
        }

        .btn-login {

            width: 100%;

            padding: 10px;

            background: #28a745;

            color: white;

            border: none;

            border-radius: 5px;

            cursor: pointer;
        }

        .btn-login:hover {

            background: #218838;
        }

    </style>
</head>
<body>

<div class="card login-card">

    <div class="login-header">
        <div class="market-icon">🛒</div>
        <h2>CRM Supermarket</h2>
        <p>Sistem Manajemen Supermarket Modern</p>
    </div>

    <div class="login-body">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    required
                    autofocus
                    >
            </div>@if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif


        <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-success w-100 btn-login">
                Login Dashboard
            </button>

            <div class="text-center mt-4">

                <span class="text-muted">
                    Belum punya akun?
                </span>

                <a href="{{ route('register') }}"
                class="text-success fw-bold text-decoration-none">
                    Daftar Sekarang
                </a>

            </div>
        </form>


    </div>
</div>

</body>
</html>
