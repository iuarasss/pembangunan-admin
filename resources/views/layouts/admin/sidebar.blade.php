<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">

        <!-- Logo -->
        <a href="{{ url('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hard-hat me-2"></i>E-Proyek</h3>
        </a>

        <!-- Profil User -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">

                @php
                    // Ambil foto user
                    $userPhoto = Auth::user()->photo ?? null;
                    // Jika foto ada, ambil dari storage, jika tidak pakai default
                    $photoUrl = $userPhoto ? asset('storage/' . $userPhoto) : asset('default-user.png');
                @endphp

                <img class="rounded-circle object-fit-cover shadow-sm" src="{{ $photoUrl }}"
                    alt="{{ Auth::user()->name ?? 'User' }}"
                    style="width: 75px; height: 75px; border: 3px solid #fff; object-fit: cover;">

                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>

            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name ?? 'Guest' }}</h6>
                <span>{{ Auth::user()->role ?? 'User' }}</span>
            </div>
        </div>


        <!-- Menu Navigasi -->
        <div class="navbar-nav w-100">

            <a href="{{ url('dashboard') }}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <div class="text-muted small fw-bold text-uppercase px-3 mt-3 mb-2">Fitur Utama</div>
            <a href="{{ route('proyek.index') }}"
                class="nav-item nav-link {{ request()->is('proyek*') ? 'active' : '' }}">
                <i class="fa fa-building me-2"></i>Proyek
            </a>
            <a href="{{ route('tahapan.index') }}"
                class="nav-item nav-link {{ request()->is('tahapan*') ? 'active' : '' }}">
                <i class="fa fa-tasks me-2"></i>Tahapan Proyek
            </a>
            <a href="{{ route('progres.index') }}"
                class="nav-item nav-link {{ request()->is('progres*') ? 'active' : '' }}">
                <i class="fa fa-chart-line me-2"></i>Progres Proyek
            </a>
            <a href="{{ route('lokasi.index') }}"
                class="nav-item nav-link {{ request()->is('lokasi*') ? 'active' : '' }}">
                <i class="fa fa-map-marker-alt me-2"></i>Lokasi Proyek
            </a>
            <a href="{{ route('kontraktor.index') }}"
                class="nav-item nav-link {{ request()->is('kontraktor*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>Kontraktor
            </a>

            <div class="text-muted small fw-bold text-uppercase px-3 mt-4 mb-2">Master Data</div>
            <a href="{{ route('user.index') }}"
                class="nav-item nav-link {{ request()->is('user*') ? 'active' : '' }}">
                <i class="fa fa-user-cog me-2"></i>User
            </a>
            <a href="{{ route('warga.index') }}"
                class="nav-item nav-link {{ request()->is('warga*') ? 'active' : '' }}">
                <i class="fa fa-id-card me-2"></i>Warga
            </a>
        </div>

    </nav>
</div>
