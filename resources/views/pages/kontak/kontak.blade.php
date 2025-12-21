@extends('layouts.admin.app')

@section('title', 'Kontak Pengembang')
@section('page', 'Detail Kontak Pengembang')
@section('page-title', 'Detail Kontak Pengembang')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="bg-light rounded shadow-sm p-4 text-center">

                {{-- FOTO --}}
                <div class="mb-3">
                    <img src="{{ asset('assets-admin/img/user.jpg') }}"
                         class="rounded-circle border border-3 border-primary"
                         style="width:140px; height:140px; object-fit:cover;">
                </div>

                {{-- IDENTITAS --}}
                <h3 class="fw-bold mb-1">Ayu Sara</h3>
                <p class="mb-1 text-muted">NIM : 2457301024</p>
                <p class="mb-3 text-muted">Kelas : 2 SI D</p>

                <hr>

                {{-- KONTAK --}}
                <h5 class="fw-bold mb-3">Detail Kontak</h5>

                <div class="text-start px-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-circle bg-primary text-white me-3">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <a href="mailto:ayu24si@mahasiswa.pcr.ac.id"
                            class="text-sm font-medium text-gray-800 hover:text-blue-600">
                            ayu24si@mahasiswa.pcr.ac.id
                        </a>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="icon-circle bg-success text-white me-3">
                            <i class="fa fa-phone"></i>
                        </div>
                        <span>+62 821 5019 4726</span>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-danger text-white me-3">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <span>Jl. Rowo Sari, Pekanbaru, Riau</span>
                    </div>
                </div>

                <hr class="my-4">

                {{-- SOSIAL MEDIA --}}
                <h5 class="fw-bold mb-2">Social Media & Portofolio</h5>
                <p class="text-muted small mb-3">
                    Terhubung dan lihat aktivitas saya melalui media sosial berikut
                </p>

               <div class="d-flex justify-content-center gap-3">
    <a href="https://www.linkedin.com/in/ayu-sara-962a673a0"
       target="_blank"
       class="social-btn bg-primary"
       title="LinkedIn">
        <i class="fab fa-linkedin-in"></i>
    </a>

    <a href="https://github.com/iuarasss"
       target="_blank"
       class="social-btn bg-dark"
       title="GitHub">
        <i class="fab fa-github"></i>
    </a>

    <a href="https://instagram.com/aysrra._"
       target="_blank"
       class="social-btn bg-danger"
       title="Instagram">
        <i class="fab fa-instagram"></i>
    </a>
</div>

</div>

{{-- STYLE KHUSUS --}}
<style>
.icon-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.social-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-btn:hover {
    transform: translateY(-4px);
    opacity: 0.85;
}
</style>
@endsection
