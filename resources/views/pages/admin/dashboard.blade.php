@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid pt-4 px-4">

        {{-- ===================== --}}
        {{-- STATISTIK --}}
        {{-- ===================== --}}
        <div class="row g-4 mb-4">

            <div class="col-md-3">
                <div class="bg-light rounded p-4 shadow-sm d-flex justify-content-between">
                    <i class="fa fa-building fa-3x text-primary"></i>
                    <div class="text-end">
                        <p class="mb-1">Total Proyek</p>
                        <h5>{{ $totalProyek }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-light rounded p-4 shadow-sm d-flex justify-content-between">
                    <i class="fa fa-list fa-3x text-warning"></i>
                    <div class="text-end">
                        <p class="mb-1">Total Tahapan</p>
                        <h5>{{ $totalTahapan }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded p-4 shadow-sm d-flex align-items-center">
                    <i class="fa fa-chart-line fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-1">Rata-rata Progres</p>
                        <h6 class="mb-0">{{ number_format($rataProgress ?? 0, 1) }}%</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-light rounded p-4 shadow-sm d-flex justify-content-between">
                    <i class="fa fa-users fa-3x text-danger"></i>
                    <div class="text-end">
                        <p class="mb-1">Kontraktor</p>
                        <h5>{{ $totalKontraktor }}</h5>
                    </div>
                </div>
            </div>

        </div>

        {{-- ===================== --}}
        {{-- GRAFIK & MAP --}}
        {{-- ===================== --}}
        <div class="row g-4 mb-4">

            {{-- GRAFIK --}}
            <div class="col-lg-8">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h6 class="mb-3">Grafik Progress Proyek</h6>
                    <canvas id="progressChart"></canvas>
                </div>
            </div>

            {{-- MAP --}}
            <div class="col-lg-4">
                <div class="bg-light rounded p-4 shadow-sm">
                    <h6 class="mb-3">Peta Lokasi Proyek</h6>
                    <div id="map" style="height:300px;border-radius:10px;"></div>
                </div>
            </div>

        </div>

        {{-- ===================== --}}
        {{-- TABEL PROYEK TERBARU --}}
        {{-- ===================== --}}
        <div class="bg-light rounded p-4 shadow-sm">
            <h6 class="mb-3">Proyek Terbaru</h6>
            <table class="table table-bordered align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Proyek</th>
                        <th>Lokasi</th>
                        <th>Kontraktor</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proyekTerbaru as $p)
                        <tr>
                            <td>{{ $p->nama_proyek }}</td>
                            <td>{{ $p->lokasi->alamat ?? '-' }}</td>
                            <td>{{ $p->kontraktor->first()->nama_kontraktor ?? '-' }}</td>
                            <td>
                                <span class="badge bg-success">
                                    {{ $p->progress }}%
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

    {{-- ===================== --}}
    {{-- SCRIPT --}}
    {{-- ===================== --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <script>
        // =====================
        // CHART
        // =====================
        new Chart(document.getElementById('progressChart'), {
            type: 'bar',
            data: {
                labels: @json($chartLabel),
                datasets: [{
                    label: 'Progress (%)',
                    data: @json($chartData),
                    backgroundColor: '#0d6efd'
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
        // =====================
        // MAP
        // =====================
        const map = L.map('map').setView([0.5333, 101.45], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18
        }).addTo(map);

        @foreach ($lokasi as $l)
            @if ($l->lat && $l->lng)
                L.marker([{{ $l->lat }}, {{ $l->lng }}])
                    .addTo(map)
                    .bindPopup("{{ $l->proyek->nama_proyek ?? 'Proyek' }}");
            @endif
        @endforeach
    </script>

@endsection
