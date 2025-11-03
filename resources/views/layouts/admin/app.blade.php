@include('layouts.admin.header')

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">

        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- End Sidebar -->

        <!-- Content -->
        <div class="content flex-grow-1">

            <!-- Navbar -->
            @include('layouts.admin.navbar')
            <!-- End Navbar -->

            <!-- Main Content -->
            <div class="container-fluid pt-4 px-4">
                @yield('content')
            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')
            <!-- End Footer -->
        </div>
        <!-- End Content -->
    </div>

     <a href="https://wa.me/6282150194726?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang%20sistem%20ini"
            class="whatsapp-float" target="_blank" title="Hubungi via WhatsApp">
            <img src="{{ asset('assets-admin/img/wa.png') }}" alt="WhatsApp">
        </a>

        <!-- Style Floating WhatsApp -->
        <style>
            .whatsapp-float {
                position: fixed;
                bottom: 25px;
                right: 25px;
                width: 60px;
                height: 60px;
                background-color: #f7faf8;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                z-index: 9999;
                transition: all 0.3s ease;
            }

            .whatsapp-float img {
                width: 50px;
                height: 50px;
            }

            .whatsapp-float:hover {
                transform: scale(1.1);
                background-color: #f3f7f5;
            }

            .whatsapp-float::after {
                content: '';
                position: absolute;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.418);
                animation: pulse 1.6s infinite;
                z-index: -1;
            }

            @keyframes pulse {
                0% {
                    transform: scale(1);
                    opacity: 0.8;
                }

                100% {
                    transform: scale(1.8);
                    opacity: 0;
                }
            }
        </style>


</body>
