@extends('layouts.admin.app')

@section('title', 'Profil Pengembang')

@section('content')

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --bg-page: #f4f6f9;
            --bg-card: #ffffff;
            --border: #e5e7eb;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --secondary-light: #e0f2fe;
        }

        .admin-bg {
            background: var(--bg-page);
        }

        .profile-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .08);
        }

        .title-dark {
            color: var(--text-main);
            font-weight: 800;
        }

        .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            padding: 5px;
            background: var(--primary);
            margin-bottom: 1.5rem;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, .2);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 0;
            border-bottom: 1px dashed var(--border);
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-icon-wrapper {
            background: var(--secondary-light);
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-icon {
            color: var(--primary);
            font-size: 1rem;
        }

        .social-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .social-row {
                justify-content: center;
            }
        }

        .social-circle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .2s;
            text-decoration: none;
            box-shadow: 0 3px 6px rgba(0, 0, 0, .1);
        }

        .social-circle:hover {
            background: var(--primary-dark);
            transform: scale(1.05);
        }

        .btn-primary-admin {
            background: linear-gradient(to right, var(--primary), #4c83ff);
            color: #fff;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: .2s;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(37, 99, 235, .4);
        }

        .btn-primary-admin:hover {
            background: var(--primary-dark);
        }
    </style>

    <div class="admin-bg py-8 min-h-screen">

        <div class="profile-card">
            <div class="md:grid md:grid-cols-12 gap-12">

                {{-- KOLOM KIRI --}}
                <div class="md:col-span-5 text-center md:text-left">

                    <div class="profile-photo mx-auto md:mx-0">
                        <img src="{{ asset('assets-admin/img/user.jpg') }}" alt="Foto Pengembang">
                    </div>

                    <h3 class="text-2xl font-extrabold title-dark mb-1">Ayu Sara</h3>
                    <p class="text-sm font-semibold text-gray-700 mb-1">NIM: 2457301024</p>
                    <p class="text-base text-gray-500 mb-8">Kelas: 2 SI D</p>

                    <h4 class="font-bold text-lg mb-4 title-dark">Detail Kontak</h4>

                    <div class="contact-item">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-envelope contact-icon"></i>
                        </div>
                        <a href="mailto:ayu24si@mahasiswa.pcr.ac.id"
                            class="text-sm font-medium text-gray-800 hover:text-blue-600">
                            ayu24si@mahasiswa.pcr.ac.id
                        </a>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-phone contact-icon"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-800">
                            +62 821 5019 4726
                        </span>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-map-marker-alt contact-icon"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-800">
                            Jl. Rowo Sari, Pekanbaru, Riau
                        </span>
                    </div>
                </div>

                {{-- KOLOM KANAN --}}
                <div class="md:col-span-7 md:pl-8">

                    <h4 class="text-xl font-bold mb-2 title-dark text-center md:text-left">
                        Social Media & Portofolio
                    </h4>
                    <p class="text-sm text-gray-600 mb-6 text-center md:text-left">
                        Terhubung dan lihat aktivitas saya melalui media sosial berikut.
                    </p>

                    <div class="social-row justify-center mb-14">

                        <a href="https://www.linkedin.com/in/ayu-sara-962a673a0" target="_blank" class="social-circle">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://github.com/iuarasss" target="_blank" class="social-circle">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://instagram.com/aysrra._" target="_blank" class="social-circle">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://facebook.com/Aayusara" target="_blank" class="social-circle">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>

                    <div class="flex justify-center md:justify-start mt-4">
                        <a href="mailto:ayu24si@mahasiswa.pcr.ac.id" class="btn-primary-admin">
                            Kirim Pesan
                            <i class="fas fa-paper-plane"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
