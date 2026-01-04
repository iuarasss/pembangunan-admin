<div class="sidebar pe-3 pb-3">
    <nav class="navbar bg-light navbar-light flex-column">

        <!-- Logo -->
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('assets-admin/img/logo-proyek.png') }}" alt="Logo"
                style="height: 110px; object-fit: contain;">
        </div>


        <!-- Profil User -->
@auth
<div class="d-flex align-items-center px-3 mb-3">

    @php
        $user = Auth::user();

        $photoUrl = ($user && $user->photo)
            ? \Illuminate\Support\Facades\Storage::url($user->photo)
            : asset('assets-admin/img/default-user.png');
    @endphp

    <div class="position-relative">
        <img src="{{ $photoUrl }}"
             alt="{{ $user->name ?? 'User' }}"
             class="rounded-circle shadow-sm"
             style="width: 70px; height: 70px; object-fit: cover;">

        <span class="bg-success rounded-circle border border-2 border-white position-absolute"
              style="width: 12px; height: 12px; right: 4px; bottom: 4px;">
        </span>
    </div>

    <div class="ms-3">
        <h6 class="mb-0 fw-semibold">{{ $user->name }}</h6>
        <small class="text-muted">{{ ucfirst($user->role ?? 'user') }}</small>
    </div>

</div>
@endauth



        <!-- Menu Navigasi -->
        <div class="navbar-nav w-100">

            <a href="{{ url('dashboard') }}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <div class="text-muted small fw-bold text-uppercase px-3 mt-3 mb-2">
                Fitur Utama
            </div>

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

            <div class="text-muted small fw-bold text-uppercase px-3 mt-4 mb-2">
                Master Data
            </div>

            <a href="{{ route('user.index') }}"
                class="nav-item nav-link {{ request()->is('user*') ? 'active' : '' }}">
                <i class="fa fa-user-cog me-2"></i>User
            </a>

            <a href="{{ route('warga.index') }}"
                class="nav-item nav-link {{ request()->is('warga*') ? 'active' : '' }}">
                <i class="fa fa-id-card me-2"></i>Warga
            </a>

            <div class="text-muted small fw-bold text-uppercase px-3 mt-4 mb-2">
                Kontak Pengembang
            </div>

            <a href="{{ route('kontak') }}" class="nav-item nav-link {{ request()->is('kontak*') ? 'active' : '' }}">
                <i class="fa fa-address-book me-2"></i>Kontak
            </a>

        </div>
    </nav>
</div>
