@extends('layouts.admin.app')

@section('title', 'Data Warga')
@section('page', 'Data Warga')
@section('page-title', 'Index Data Warga')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="text-primary mb-0">
                    <i class="fa fa-id-card me-2"></i>Data Warga
                </h5>
                <a href="{{ route('warga.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus me-1"></i>Tambah Warga
                </a>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-end mt-3">
                {{ $warga->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

            {{-- Search --}}
            <form method="GET" class="row g-2 mb-3">
                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="form-control" placeholder="Cari nama atau NIK...">
                </div>

                <div class="col-md-3">
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Semua Jenis Kelamin --</option>
                        <option value="Laki-laki" @selected(request('jenis_kelamin') == 'Laki-laki')>
                            Laki-laki
                        </option>
                        <option value="Perempuan" @selected(request('jenis_kelamin') == 'Perempuan')>
                            Perempuan
                        </option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Cari</button>
                </div>

                <div class="col-md-2">
                    <a href="{{ route('warga.index') }}" class="btn btn-secondary w-100">Reset</a>
                </div>
            </form>

            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Tabel Warga --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Profil</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th width="140" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($warga as $index => $item)
                            <tr>
                                <td class="text-center">{{ $warga->firstItem() + $index }}</td>

                                {{-- PROFIL WARGA --}}
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img
                                            src="{{ $item->foto
                                                ? asset('storage/' . $item->foto)
                                                : asset('assets-admin/img/default-user.png') }}"
                                            class="rounded-circle shadow-sm"
                                            width="45"
                                            height="45"
                                            style="object-fit: cover;"
                                            alt="Foto Warga">

                                        <div>
                                            <div class="fw-semibold">{{ $item->nama }}</div>
                                            <small class="text-muted">NIK: {{ $item->nik }}</small>
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $item->jenis_kelamin }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>

                                <td class="text-center">
                                    <a href="{{ route('warga.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning me-1">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('warga.destroy', $item->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data warga ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-3">
                                    Belum ada data warga.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
