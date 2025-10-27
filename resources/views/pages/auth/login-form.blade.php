<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - E-Proyek</title>
    <link rel="stylesheet" href="{{ asset('css/style.css?v=2') }}">
</head>

<body>
    <div class="glowing-light"></div>
    <div class="login-box">

        <form action="{{ url('/auth/login') }}" method="POST">
            @csrf

            <!-- Toggle light -->
            <input type="checkbox" class="input-check" id="input-check" />
            <label for="input-check" class="toggle">
                <span class="text off">off</span>
                <span class="text on">on</span>
            </label>
            <div class="light"></div>

            <h2>Login Ke E-Proyek</h2>

            <!-- Email -->
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" name="email" value="{{ old('email') }}" required />
                <label>Email</label>
                <div class="input-line"></div>
            </div>

            <!-- Password -->
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" name="password" required />
                <label>Password</label>
                <div class="input-line"></div>
            </div>

            <!-- Remember & forgot -->
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember" /> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit">Login</button>

            <!-- Error / Success Message -->
            @if (session('error'))
                <p style="color:red; margin-top:10px;">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p style="color:green; margin-top:10px;">{{ session('success') }}</p>
            @endif

            @error('email')
                <p style="color:red; margin-top:10px;">{{ $message }}</p>
            @enderror
            @error('password')
                <p style="color:red; margin-top:10px;">{{ $message }}</p>
            @enderror

            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Icon Script -->
    <script type="module"
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
