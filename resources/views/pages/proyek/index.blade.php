@extends('layouts.admin.app')

@section('title', 'Data Proyek - E-Proyek')
@section('page', 'Data Proyek')
@section('page-title', 'Index Data Proyek')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">

            <!-- Header + Search + Filter -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0">Daftar Proyek</h5>
                <a href="{{ route('proyek.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah Proyek
                </a>
            </div>

            <!-- PAGINATION RAPIIII -->
            <div class="d-flex justify-content-end mt-3">
                {{ $proyek->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

            <!-- Form Search & Filter -->
            <form method="GET" action="{{ route('proyek.index') }}" class="row g-3 mb-4">

                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama proyek / lokasi..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="tahun" class="form-control">
                        <option value="">Filter Tahun</option>
                        @foreach (range(2018, 2025) as $th)
                            <option value="{{ $th }}" {{ request('tahun') == $th ? 'selected' : '' }}>
                                {{ $th }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">Filter Status</option>
                        <option value="rencana" {{ request('status') == 'rencana' ? 'selected' : '' }}>Rencana</option>
                        <option value="berjalan" {{ request('status') == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-secondary w-100">
                        <i class="fa fa-search me-1"></i>Cari
                    </button>
                </div>
            </form>

            <!-- Alert -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Tabel Proyek -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Proyek</th>
                            <th>Lokasi</th>
                            <th>Tahun</th>
                            <th>Anggaran</th>
                            <th>Status</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proyek as $item)
                            <tr>
                                <td>{{ $item->kode_proyek }}</td>
                                <td class="text-start">
                                    <strong>{{ $item->nama_proyek }}</strong><br>
                                    <small class="text-muted">{{ $item->sumber_dana }}</small>
                                </td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>Rp{{ number_format($item->anggaran, 0, ',', '.') }}</td>

                                <td>
                                    @if ($item->progress >= 100)
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif ($item->progress >= 50)
                                        <span class="badge bg-warning text-dark">Berjalan</span>
                                    @else
                                        <span class="badge bg-secondary">Rencana</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('proyek.edit', $item->id_proyek) }}"
                                        class="btn btn-outline-success btn-sm" title="Edit">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <form action="{{ route('proyek.destroy', $item->id_proyek) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus proyek ini?')" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada data proyek.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>



        </div>
    </div>
@endsection
