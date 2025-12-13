@extends('layouts.admin.app')

@section('title', 'Profil Pengembang')

@section('content')

    <style>
        :root {
            --primary: #2563eb;
            /* Biru Utama */
            --primary-dark: #1e40af;
            /* Biru Gelap */
            --bg-page: #f4f6f9;
            /* Background Halaman Admin */
            --bg-card: #ffffff;
            --border: #e5e7eb;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --secondary-light: #e0f2fe;
            /* Warna latar ikon kontak */
        }

        .admin-bg {
            background: var(--bg-page);
        }

        /* 1. KARTU UTAMA (Profile Card) */
        .profile-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 3rem;
            /* Padding lebih besar */
            box-shadow: 0 6px 20px rgba(0, 0, 0, .08);
            /* Bayangan lebih dalam */
        }

        .title-dark {
            color: var(--text-main);
            font-weight: 800;
            /* Lebih tebal */
        }

        /* 2. FOTO PROFIL (Dibuat Lebih Fokus) */
        .profile-photo {
            width: 120px;
            /* Ukuran lebih besar */
            height: 120px;
            border-radius: 50%;
            padding: 5px;
            /* Padding lebih tebal */
            background: var(--primary);
            margin-bottom: 1.5rem;
            /* Tambah efek border halus */
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            /* Border putih yang tegas */
        }

        /* 3. DETAIL KONTAK (Ikon Rapi) */
        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
            /* Jarak yang pas */
            padding: 10px 0;
            border-bottom: 1px dashed var(--border);
            /* Pemisah yang lebih halus */
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-icon-wrapper {
            background: var(--secondary-light);
            /* Latar belakang ikon */
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

        /* 4. SOSIAL MEDIA */
        .social-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            /* Izinkan pindah baris jika layar kecil */
        }

        .social-circle {
            width: 42px;
            /* Ukuran tombol lebih besar */
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
            /* Efek zoom halus */
        }

        /* 5. TOMBOL */
        .btn-primary-admin {
            background: linear-gradient(to right, var(--primary), #4c83ff);
            /* Gradient pada tombol */
            color: #fff;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: .2s;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.4);
        }

        .btn-primary-admin:hover {
            background: var(--primary-dark);
            box-shadow: 0 2px 5px rgba(37, 99, 235, 0.4);
        }

        /* Penyesuaian Responsif (Mobile) */
        @media (max-width: 768px) {
            .profile-card {
                padding: 1.5rem;
            }

            .md\:text-left {
                /* Atur semua ke tengah saat mobile */
                text-align: center !important;
            }

            .md\:border-r {
                /* Hilangkan garis pemisah di mobile */
                border-right: none !important;
                border-bottom: 1px solid var(--border);
                padding-bottom: 20px;
                margin-bottom: 20px;
                padding-right: 0 !important;
            }

            .contact-item,
            .contact-item .flex {
                /* Pusatkan ikon dan detail di mobile */
                justify-content: center !important;
            }

            .md\:grid-cols-12 {
                display: block;
            }
        }
    </style>

    <div class="admin-bg py-8 min-h-screen">
        <div class="max-w-5xl mx-auto px-4">

            <h1 class="text-3xl font-extrabold text-gray-800 mb-6">Profil Pengembang Web</h1>

            <div class="profile-card">

                <div class="md:grid md:grid-cols-12 gap-12">

                    {{-- KOLOM KIRI (Info Dasar & Kontak) --}}
                    <div class="md:col-span-5 text-center md:text-left">

                        <div class="profile-photo mx-auto md:mx-0">
                            {{-- FOTO PENGEMBANG --}}
                            <img src="{{ asset('assets-admin/img/user.jpg') }}" alt="Foto Pengembang">
                        </div>

                        {{-- INFO UTAMA DISAJIKAN LEBIH TEGAS --}}
                        <h3 class="text-2xl font-extrabold title-dark mb-1">Ayu Sara</h3>
                        <p class="text-sm font-semibold text-gray-700 mb-1">NIM: 245730</p>
                        <p class="text-base text-gray-500 mb-8">Kelas: 2 SI D</p>

                        {{-- DETAIL KONTAK --}}
                        <div class="pt-4">
                            <h4 class="font-bold text-lg mb-4 title-dark">Detail Kontak</h4>

                            <div class="space-y-2">
                                {{-- EMAIL --}}
                                <div class="contact-item">
                                    <div class="contact-icon-wrapper">
                                        <i class="fas fa-envelope contact-icon"></i>
                                    </div>
                                    <div>
                                        <a href="mailto:ayu24si@mahasiswa.pcr.ac.id"
                                            class="text-sm font-medium text-gray-800 hover:text-blue-600">
                                            ayu24si@mahasiswa.pcr.ac.id
                                        </a>
                                    </div>
                                </div>

                                {{-- TELEPON --}}
                                <div class="contact-item">
                                    <div class="contact-icon-wrapper">
                                        <i class="fas fa-phone contact-icon"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-800">
                                            +62 819 5019 4726
                                        </span>
                                    </div>
                                </div>

                                {{-- ALAMAT --}}
                                <div class="contact-item">
                                    <div class="contact-icon-wrapper">
                                        <i class="fas fa-map-marker-alt contact-icon"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">
                                            Jl. Rowo Sari No. XX, Pekanbaru, Riau
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- KOLOM KANAN (Sosial Media & Aksi) --}}
                    <div class="md:col-span-7 md:pl-8">

                        <h4 class="text-xl font-bold mb-2 title-dark text-center md:text-left">
                            Social Media & Portofolio
                        </h4>
                        <p class="text-sm text-gray-600 mb-6 text-center md:text-left">
                            Terhubung dan lihat aktivitas saya melalui media sosial berikut.
                        </p>

                        <div class="social-row justify-center md:justify-start mb-10">
                            {{-- Tombol Sosial Media --}}
                            <a href="#" class="social-circle" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-circle" title="GitHub"><i class="fab fa-github"></i></a>
                            <a href="#" class="social-circle" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-circle" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        </div>

                        {{-- TOMBOL AKSI --}}
                        <div class="flex justify-center md:justify-start">
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
