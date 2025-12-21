<head>
    <!-- ================= META ================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'E-Proyek') - Pembangunan & Monitoring Proyek</title>
    <meta name="description" content="Sistem Informasi Pembangunan dan Monitoring Proyek">
    <meta name="keywords" content="E-Proyek, Monitoring Proyek, Sistem Informasi Proyek">

    <!-- ================= FAVICON ================= -->
    <link rel="icon" href="{{ asset('assets-admin/img/favicon.ico') }}" type="image/x-icon">

    <!-- ================= GOOGLE FONTS ================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- ================= ICONS ================= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- ================= LIBRARIES ================= -->
    <link rel="stylesheet" href="{{ asset('assets-admin/lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- ================= CORE CSS ================= -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">

    <!-- ================= PAGE SPECIFIC CSS ================= -->
    @stack('styles')
</head>
