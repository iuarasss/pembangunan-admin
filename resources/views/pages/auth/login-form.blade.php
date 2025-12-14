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


        <div class="login-wrapper">
            <h1>Login ke Sistem</h1>


            {{-- Pesan sukses --}}
            @if (session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Pesan error umum --}}
            @if (session('error'))
                <div class="alert error">
                    {{ session('error') }}
                </div>
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

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </section>
</body>

</html>
