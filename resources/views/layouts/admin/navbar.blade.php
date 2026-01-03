<nav class="navbar navbar-expand bg-light navbar-light sticky-top shadow-sm">
    <div class="container-fluid px-4">

        <!-- Sidebar Toggler -->
        <a href="#" class="sidebar-toggler flex-shrink-0 me-3">
            <i class="fa fa-bars fs-5"></i>
        </a>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="d-none d-md-block">
            <ol class="breadcrumb mb-0 align-items-center">
                <li class="breadcrumb-item">
                    <span class="text-dark fw-medium">Pages</span>
                </li>
                <li class="breadcrumb-item active fw-semibold text-dark">
                    @yield('page')
                </li>
            </ol>
        </nav>

        <!-- Right Navbar -->
        @auth
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">

                @php
                    $user = Auth::user();
                    $photoUrl = $user->photo
                        ? Storage::url($user->photo)
                        : asset('assets-admin/img/default-user.png');
                @endphp

                <a href="#"
                   class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                   data-bs-toggle="dropdown">
                    <img class="rounded-circle shadow-sm"
                         src="{{ $photoUrl }}"
                         alt="{{ $user->name }}"
                         width="32"
                         height="32"
                         style="object-fit: cover;">
                    <span class="d-none d-lg-inline fw-medium">
                        {{ $user->name }}
                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">

                    <!-- PROFIL -->
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fa fa-user me-2"></i> Profil Saya
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- LOGOUT -->
                    <a href="{{ route('logout') }}"
                       class="dropdown-item text-danger"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt me-2"></i> Logout
                    </a>

                    <form id="logout-form"
                          action="{{ route('logout') }}"
                          method="POST"
                          class="d-none">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
        @endauth

    </div>
</nav>
