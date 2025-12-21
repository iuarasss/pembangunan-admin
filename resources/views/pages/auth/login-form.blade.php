<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ke E-Proyek</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css?v=7') }}">
</head>

<body>
    <section class="container">

    <div class="login-left"
     style="
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
     ">

    <div style="max-width: 1000px;">
        <img src="{{ asset('assets-admin/img/logo-proyek.png') }}"
             alt="Logo"
             style="width: 700px;">

        <h2 style="color:#0f172a; margin-bottom:10px;">
            Pembangunan & Monitoring Proyek
        </h2>

        <p style="color:#475569; line-height:1;">
            Sistem informasi untuk mengelola data proyek, lokasi,
            kontraktor, serta progres pembangunan secara terintegrasi
            dan efisien.
        </p>
    </div>

</div>


    <!-- BAGIAN KANAN (FORM LOGIN) -->
    <div class="login-wrapper">
        <h1>Login ke Sistem</h1>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        {{-- Pesan error --}}
        @if (session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        {{-- Error validasi --}}
        @if ($errors->any())
            <div class="alert error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="form">
            @csrf

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>

</section>

</body>

</html>
