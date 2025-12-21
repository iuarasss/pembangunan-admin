@extends('layouts.admin.app')

@section('title', 'Data Lokasi')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="text-primary mb-0">
                    <i class="fa fa-map-marker-alt me-2"></i>Data Lokasi
                </h5>
                <a href="{{ route('lokasi.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus me-1"></i>Tambah
                </a>
            </div>
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-4">
        <input type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Cari nama proyek...">
    </div>

    <div class="col-md-3">
        <select name="filter" class="form-select">
            <option value="">-- Semua Lokasi --</option>
            <option value="lengkap" {{ request('filter') == 'lengkap' ? 'selected' : '' }}>
                Lokasi Lengkap
            </option>
            <option value="kosong" {{ request('filter') == 'kosong' ? 'selected' : '' }}>
                Lokasi Kosong
            </option>
        </select>
    </div>


    <div class="col-md-2">
        <button class="btn btn-primary w-100">
            <i class="fa fa-search me-1"></i>Filter
        </button>
    </div>
</form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Lokasi</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lokasi as $i => $l)
                           <tr>
    <td>{{ $i + 1 }}</td>

    {{-- Nama Lokasi / Proyek --}}
    <td>{{ $l->proyek->nama_proyek ?? '-' }}</td>

    {{-- Latitude --}}
    <td class="text-center">
        {{ $l->lat ?? '-' }}
    </td>

    {{-- Longitude --}}
    <td class="text-center">
        {{ $l->lng ?? '-' }}
    </td>

    {{-- Aksi --}}
    <td class="text-center">
        {{-- Tombol Edit --}}
        <a href="{{ route('lokasi.edit', $l->lokasi_id) }}"
            class="btn btn-outline-success btn-sm"
            title="Edit Lokasi">
            <i class="fa fa-pen"></i>
        </a>

        {{-- Tombol Hapus --}}
        <form action="{{ route('lokasi.destroy', $l->lokasi_id) }}"
            method="POST"
            class="d-inline"
            onsubmit="return confirm('Yakin ingin menghapus lokasi proyek ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="btn btn-outline-danger btn-sm"
                title="Hapus Lokasi">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </td>
</tr>

                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada data lokasi</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
