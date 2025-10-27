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
            <a href="{{ url('dashboard') }}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <a href="{{ route('proyek.index') }}" class="nav-item nav-link {{ request()->is('proyek*') ? 'active' : '' }}">
                <i class="fa fa-building me-2"></i>Proyek
            </a>

            <a href="{{ route('user.index') }}" class="nav-item nav-link {{ request()->is('user*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>User
            </a>


            <a href="{{ route('warga.index') }}" class="nav-item nav-link {{ request()->is('warga*') ? 'active' : '' }}">
                <i class="fa fa-id-card me-2"></i>Warga
            </a>
        </div>
    </nav>
</div>
