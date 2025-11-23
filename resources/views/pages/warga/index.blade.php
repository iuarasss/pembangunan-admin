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

            <!-- PAGINATION RAPIIII -->
            <div class="d-flex justify-content-end mt-3">
                {{ $warga->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

            {{-- Search --}}
            <form method="GET" class="row g-2 mb-3">
                <div class="col-md-4">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari nama atau NIK...">
                </div>

                <div class="col-md-3">
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Semua Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
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

            {{-- Pesan sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Tabel warga --}}
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($warga as $index => $item)
                            <tr>
                                <td class="text-center">{{ $warga->firstItem() + $index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('warga.destroy', $item->id) }}" method="POST" class="d-inline"
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
