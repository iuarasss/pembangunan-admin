<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form Animation CSS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="glowing-light"></div>
    <div class="login-box">
        <!-- Form diarahkan ke route /auth/login -->
        <form action="{{ url('/auth/login') }}" method="POST">
            @csrf

            <!-- Toggle -->
            <input type="checkbox" class="input-check" id="input-check" />
            <label for="input-check" class="toggle">
                <span class="text off">off</span>
                <span class="text on">on</span>
            </label>
            <div class="light"></div>

            <h2>Login</h2>

            <!-- Username -->
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" name="username" required />
                <label>Username</label>
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
                <label><input type="checkbox" /> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit">Login</button>

            <!-- Pesan error atau success -->
            @if (session('error'))
                <p style="color:red; margin-top:10px;">{{ session('error') }}</p>
            @endif
            @if (session('success'))
                <p style="color:green; margin-top:10px;">{{ session('success') }}</p>
            @endif

            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>






