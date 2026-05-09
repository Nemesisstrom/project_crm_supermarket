<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register CRM Supermarket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            min-height:100vh;

            background:
                linear-gradient(rgba(15,23,42,.85),rgba(15,23,42,.9)),
                url('https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1600');

            background-size:cover;
            background-position:center;

            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
        }

        .register-box{

            width:100%;
            max-width:500px;

            background:white;

            border-radius:30px;

            padding:45px;

            box-shadow:0 10px 40px rgba(0,0,0,.3);
        }

        .logo{

            font-size:60px;
            text-align:center;
            margin-bottom:10px;
        }

        .title{

            text-align:center;
            font-weight:700;
            margin-bottom:10px;
        }

        .subtitle{

            text-align:center;
            color:#64748b;
            margin-bottom:35px;
        }

        .form-control{

            height:55px;

            border-radius:14px;

            border:1px solid #cbd5e1;
        }

        .form-control:focus{

            border-color:#22c55e;

            box-shadow:0 0 0 .2rem rgba(34,197,94,.2);
        }

        .btn-register{

            height:55px;

            border:none;

            border-radius:14px;

            background:linear-gradient(135deg,#16a34a,#22c55e);

            font-weight:600;
        }

        .btn-register:hover{

            background:linear-gradient(135deg,#15803d,#16a34a);
        }

    </style>

</head>
<body>

<div class="register-box">

    <div class="logo">
        🛒
    </div>

    <h2 class="title">
        CRM Supermarket
    </h2>

    <p class="subtitle">
        Buat akun baru untuk masuk ke sistem supermarket
    </p>

    @if($errors->any())

        <div class="alert alert-danger">

            {{ $errors->first() }}

        </div>

    @endif

    <form method="POST"
          action="{{ route('register') }}">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Masukkan nama"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan email"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Konfirmasi Password
            </label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   placeholder="Ulangi password"
                   required>

        </div>

        <button class="btn btn-success w-100 btn-register">

            Register Account

        </button>

    </form>

    <div class="text-center mt-4">

        <span class="text-muted">
            Sudah punya akun?
        </span>

        <a href="{{ route('login') }}"
           class="text-success fw-bold text-decoration-none">

            Login

        </a>

    </div>

</div>

</body>
</html>
