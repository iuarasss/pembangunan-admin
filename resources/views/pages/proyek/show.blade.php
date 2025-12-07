@extends('layouts.admin.app')

@section('title', 'Detail Proyek - E-Proyek')
@section('page', 'Data Proyek')
@section('page-title', 'Detail Proyek')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Detail Proyek: {{ $proyek->nama_proyek }}</h5>
            <a href="{{ route('proyek.index') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="row">

            {{-- ================================
                KOLOM KIRI – INFORMASI PROYEK
            ================================= --}}
            <div class="col-lg-4 col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Informasi Proyek</h6>

                        <p><strong>Kode Proyek:</strong> {{ $proyek->kode_proyek }}</p>
                        <p><strong>Tahun:</strong> {{ $proyek->tahun }}</p>
                        <p><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
                        <p><strong>Anggaran:</strong> Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</p>
                        <p><strong>Progress:</strong> {{ $proyek->progress }}%</p>

                        <p><strong>Deskripsi:</strong></p>
                        <p class="text-muted">{!! nl2br(e($proyek->deskripsi)) !!}</p>
                    </div>
                </div>
            </div>

            {{-- ================================
                KOLOM KANAN – MEDIA PROYEK
            ================================= --}}
            <div class="col-lg-8 col-md-7 mb-4">
                <h6 class="fw-bold mb-3">Media Proyek</h6>

                @if ($media->count() == 0)
                    <p class="text-muted">Belum ada media yang di-upload.</p>

                @else
                    <div class="row">
                        @foreach ($media as $m)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card shadow-sm h-100">

                                    {{-- PREVIEW --}}
                                    <div class="p-2 text-center">

                                        {{-- Gambar --}}
                                        @if (str_starts_with($m->mime_type, 'image/'))
                                            {{-- SINKRONISASI: Menggunakan asset() untuk URL publik --}}
                                            <img src="{{ asset('storage/proyek/' . $m->file_name) }}"
                                                class="img-fluid rounded"
                                                style="height: 150px; width: 100%; object-fit: cover;">

                                        {{-- PDF --}}
                                        @elseif ($m->mime_type === 'application/pdf')
                                            <i class="bi bi-filetype-pdf text-danger" style="font-size: 60px;"></i>

                                        {{-- File Lain --}}
                                        @else
                                            <i class="bi bi-file-earmark-text" style="font-size: 60px;"></i>
                                        @endif

                                        <p class="small mt-2 text-truncate">{{ $m->file_name }}</p>
                                    </div>

                                    {{-- TOMBOL --}}
                                    <div class="card-footer bg-white border-0">
                                        {{-- SINKRONISASI: Menggunakan asset() untuk URL Lihat/Download --}}
                                        <a href="{{ asset('storage/proyek/' . $m->file_name) }}"
                                            target="_blank"
                                            class="btn btn-sm btn-outline-primary w-100">
                                            <i class="fa fa-download me-1"></i> Lihat
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>

    </div>
</div>
@endsection
