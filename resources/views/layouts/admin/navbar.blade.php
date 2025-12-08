<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0 shadow-sm">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>

    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="#"> Pages </a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            @yield('page')
        </li>
    </ol>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">

            @php
                // Ambil foto user
                $userPhoto = Auth::user()->photo ?? null;
                // Generate link foto storage atau default
                $photoUrl = $userPhoto ? asset('storage/' . $userPhoto) : asset('default-user.png');
            @endphp

            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle object-fit-cover shadow-sm"
                     src="{{ $photoUrl }}"
                     alt="{{ Auth::user()->name ?? 'User' }}"
                     style="width: 30px; height: 30px; object-fit: cover;">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name ?? 'Guest' }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
            </div>

        </div>
    </div>
</nav>
