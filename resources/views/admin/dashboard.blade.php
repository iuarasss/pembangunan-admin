<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Proyek - Pembangunan dan Monitoring Proyek</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hard-hat me-2"></i>E-Proyek</h3>
                </a>

                <!-- Profil Admin -->
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle object-fit-cover" src="{{ asset('assets-admin/img/ayes.jpg') }}"
                            alt="Ayu Sara" style="width: 60px; height: 60px;object-fit: cover; border: 2px solid #fff;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Ayu Sara</h6>
                        <span>Admin</span>
                    </div>
                </div>

                <!-- Menu Navigasi -->
                <div class="navbar-nav w-100">
                    <a href="{{ url('dashboard') }}" class="nav-item nav-link active">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                    </a>

                    <!-- Menu Proyek -->
                    <a href="{{ route('proyek.index') }}" class="nav-item nav-link">
                        <i class="fa fa-building me-2"></i>Proyek
                    </a>

                    <a href="{{ url('tahapan-proyek') }}" class="nav-item nav-link">
                        <i class="fa fa-tasks me-2"></i>Tahapan Proyek
                    </a>

                    <a href="{{ url('progres-proyek') }}" class="nav-item nav-link">
                        <i class="fa fa-chart-line me-2"></i>Progres Proyek
                    </a>

                    <a href="{{ url('lokasi-proyek') }}" class="nav-item nav-link">
                        <i class="fa fa-map-marker-alt me-2"></i>Lokasi Proyek
                    </a>

                    <a href="{{ url('kontraktor') }}" class="nav-item nav-link">
                        <i class="fa fa-users me-2"></i>Kontraktor
                    </a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
            </nav>
            <!-- Navbar End -->

            <!-- Dashboard Content -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <!-- Statistik Utama -->
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                            <i class="fa fa-building fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Proyek</p>
                                <h6 class="mb-0">24 Proyek</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                            <i class="fa fa-tasks fa-3x text-warning"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Tahapan</p>
                                <h6 class="mb-0">132 Tahapan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                            <i class="fa fa-chart-line fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Rata-rata Progres</p>
                                <h6 class="mb-0">68%</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 shadow-sm">
                            <i class="fa fa-users fa-3x text-danger"></i>
                            <div class="ms-3">
                                <p class="mb-2">Kontraktor Aktif</p>
                                <h6 class="mb-0">15 Kontraktor</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik & Progress -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Grafik Progress Proyek -->
                    <div class="col-sm-12 col-md-8">
                        <div class="bg-light rounded p-4 shadow-sm">
                            <h6 class="mb-4">Grafik Progress Proyek</h6>
                            <canvas id="progressChart"></canvas>
                        </div>
                    </div>

                    <!-- Lokasi Proyek Aktif -->
                    <div class="col-sm-12 col-md-4">
                        <div class="bg-light rounded p-4 shadow-sm">
                            <h6 class="mb-4">Sebaran Lokasi Proyek</h6>
                            <div id="map" style="height: 300px; border-radius: 10px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Proyek Terkini -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h6 class="mb-4">Proyek Terbaru</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Proyek</th>
                                    <th>Lokasi</th>
                                    <th>Kontraktor</th>
                                    <th>Tahapan Aktif</th>
                                    <th>Progres</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pembangunan Gedung DPRD</td>
                                    <td>Pekanbaru</td>
                                    <td>PT. Bina Karya</td>
                                    <td>Pengecoran Lantai 3</td>
                                    <td><span class="badge bg-success">85%</span></td>
                                </tr>
                                <tr>
                                    <td>Perbaikan Jalan Soebrantas</td>
                                    <td>Tampan</td>
                                    <td>CV. Maju Jaya</td>
                                    <td>Pengerasan Aspal</td>
                                    <td><span class="badge bg-warning">50%</span></td>
                                </tr>
                                <tr>
                                    <td>Pembangunan Jembatan Siak V</td>
                                    <td>Rumbai</td>
                                    <td>PT. Cipta Beton</td>
                                    <td>Struktur Baja</td>
                                    <td><span class="badge bg-primary">70%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Aktivitas Lapangan -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h6 class="mb-4">Aktivitas Terbaru</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">18 Okt 2025 - Pengecoran selesai di proyek Gedung DPRD (Kontraktor:
                            PT. Bina Karya)</li>
                        <li class="list-group-item">17 Okt 2025 - Pengiriman material baja untuk Jembatan Siak V
                            (Kontraktor: PT. Cipta Beton)</li>
                        <li class="list-group-item">16 Okt 2025 - Pengerasan lapisan dasar Jalan Soebrantas dimulai
                            (Kontraktor: CV. Maju Jaya)</li>
                    </ul>
                </div>
            </div>

            <!-- Script Grafik dan Peta -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

            <script>
                // Grafik Progress
                const ctx = document.getElementById('progressChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Gedung DPRD', 'Jalan Soebrantas', 'Jembatan Siak V', 'Kantor Walikota',
                            'Puskesmas Rumbai'
                        ],
                        datasets: [{
                            label: 'Progress (%)',
                            data: [85, 50, 70, 60, 40],
                            backgroundColor: ['#0d6efd', '#ffc107', '#198754', '#0dcaf0', '#dc3545']
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });

                // Peta Lokasi Proyek
                const map = L.map('map').setView([0.5333, 101.4500], 11);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                }).addTo(map);

                L.marker([0.5333, 101.4500]).addTo(map).bindPopup('Gedung DPRD - 85%');
                L.marker([0.5200, 101.4200]).addTo(map).bindPopup('Jalan Soebrantas - 50%');
                L.marker([0.6000, 101.4300]).addTo(map).bindPopup('Jembatan Siak V - 70%');
            </script>



            <!-- Content End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries (pakai CDN biar cepat) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Libraries dari assets-admin -->
        <script src="{{ asset('assets-admin/lib/chart/chart.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('assets-admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>

</html>
