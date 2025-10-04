<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard</h1>
    @if(session('success'))
        <p style="color: rgb(248, 152, 202);">{{ session('success') }}</p>
    @endif
</body>
</html>
