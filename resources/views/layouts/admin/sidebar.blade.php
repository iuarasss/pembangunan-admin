<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <!-- Logo dan Judul -->
        <a href="{{ url('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hard-hat me-2"></i>E-Proyek</h3>
        </a>

        <!-- Profil User -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle object-fit-cover" src="{{ asset('assets-admin/img/user.jpg') }}" alt="Ayu Sara"
                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid #fff;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Ayu Sara</h6>
                <span>Admin</span>
            </div>
        </div>

        <!-- Menu Navigasi -->
        <div class="navbar-nav w-100">
            <!-- Menu Dashboard -->
            <a href="{{ url('dashboard') }}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <!-- Fitur Utama (Kategori) -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownFiturUtama" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-cogs me-2"></i>Fitur Utama
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownFiturUtama">
                    <!-- Menu Proyek -->
                    <li><a href="{{ route('proyek.index') }}" class="dropdown-item {{ request()->is('proyek*') ? 'active' : '' }}">
                        <i class="fa fa-building me-2"></i>Proyek
                    </a></li>
                    <!-- Menu Tahapan Proyek -->
                    <li><a href="{{ route('tahapan.index') }}" class="dropdown-item {{ request()->is('tahapan*') ? 'active' : '' }}">
                        <i class="fa fa-list me-2"></i>Tahapan Proyek
                    </a></li>
                    <!-- Menu Progres Proyek -->
                    <li><a href="{{ route('progres.index') }}" class="dropdown-item {{ request()->is('progres*') ? 'active' : '' }}">
                        <i class="fa fa-chart-line me-2"></i>Progres Proyek
                    </a></li>
                    <!-- Menu Lokasi Proyek -->
                    <li><a href="{{ route('lokasi.index') }}" class="dropdown-item {{ request()->is('lokasi*') ? 'active' : '' }}">
                        <i class="fa fa-map-marker-alt me-2"></i>Lokasi Proyek
                    </a></li>
                    <!-- Menu Kontraktor -->
                    <li><a href="{{ route('kontraktor.index') }}" class="dropdown-item {{ request()->is('kontraktor*') ? 'active' : '' }}">
                        <i class="fa fa-people-carry me-2"></i>Kontraktor
                    </a></li>
                </ul>
            </div>

            <!-- Master Data (Kategori) -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMasterData" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-database me-2"></i>Master Data
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMasterData">
                    <!-- Menu User -->
                    <li><a href="{{ route('user.index') }}" class="dropdown-item {{ request()->is('user*') ? 'active' : '' }}">
                        <i class="fa fa-users me-2"></i>User
                    </a></li>
                    <!-- Menu Warga -->
                    <li><a href="{{ route('warga.index') }}" class="dropdown-item {{ request()->is('warga*') ? 'active' : '' }}">
                        <i class="fa fa-id-card me-2"></i>Warga
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
