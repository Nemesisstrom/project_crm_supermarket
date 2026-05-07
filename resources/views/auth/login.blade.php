<!DOCTYPE html>
<html>
<head>
    <title>Login CRM Supermarket</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 20px;
            overflow: hidden;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .login-header {
            background: #22c55e;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .login-header h2 {
            margin: 0;
            font-weight: bold;
        }

        .login-header p {
            margin-top: 10px;
            opacity: 0.9;
        }

        .login-body {
            background: white;
            padding: 35px;
        }

        .form-control {
            height: 50px;
            border-radius: 12px;
        }

        login:hover {
            background: #16a34a;
        }

        .market-icon {
            fo.btn-login {
            height: 50px;
            border-radius: 12px;
            background: #22c55e;
            border: none;
            font-weight: bold;
        }

        .btnnt-size: 60px;
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
        </form>

    </div>
</div>

</body>
</html>