@extends('layouts.admin.app')

@section('title', 'Dashboard - E-Proyek')

@section('content')
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

    <!-- Grafik & Peta -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h6 class="mb-4">Grafik Progress Proyek</h6>
                    <canvas id="progressChart"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h6 class="mb-4">Sebaran Lokasi Proyek</h6>
                    <div id="map" style="height: 300px; border-radius: 10px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Proyek Terbaru -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <h6 class="mb-4">Proyek Terbaru</h6>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary text-center">
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

    <!-- Aktivitas Terbaru -->
    <div class="container-fluid pt-4 px-4 mb-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <h6 class="mb-4">Aktivitas Terbaru</h6>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">18 Okt 2025 - Pengecoran selesai di proyek Gedung DPRD (PT. Bina Karya)</li>
                <li class="list-group-item">17 Okt 2025 - Pengiriman material baja untuk Jembatan Siak V (PT. Cipta Beton)</li>
                <li class="list-group-item">16 Okt 2025 - Pengerasan lapisan dasar Jalan Soebrantas dimulai (CV. Maju Jaya)</li>
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
                labels: ['Gedung DPRD', 'Jalan Soebrantas', 'Jembatan Siak V', 'Kantor Walikota', 'Puskesmas Rumbai'],
                datasets: [{
                    label: 'Progress (%)',
                    data: [85, 50, 70, 60, 40],
                    backgroundColor: ['#0d6efd', '#ffc107', '#198754', '#0dcaf0', '#dc3545']
                }]
            },
            options: { scales: { y: { beginAtZero: true, max: 100 } } }
        });

        // Peta Lokasi Proyek
        const map = L.map('map').setView([0.5333, 101.4500], 11);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 18 }).addTo(map);
        L.marker([0.5333, 101.4500]).addTo(map).bindPopup('Gedung DPRD - 85%');
        L.marker([0.5200, 101.4200]).addTo(map).bindPopup('Jalan Soebrantas - 50%');
        L.marker([0.6000, 101.4300]).addTo(map).bindPopup('Jembatan Siak V - 70%');
    </script>
@endsection
