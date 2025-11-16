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

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Tabel warga --}}
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th width="140">Aksi</th>
                </thead>
                <tbody>
                    @forelse ($warga as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
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
@endsection@extends('layouts.admin.app')

@section('title', 'Tambah Tahapan Proyek')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-primary mb-0"><i class="fa fa-plus me-2"></i>Tambah Tahapan Proyek</h5>
            <a href="{{ route('tahapan.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left me-1"></i>Kembali
            </a>
        </div>

        {{-- Pesan Error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Tahapan --}}
        <form action="{{ route('tahapan.store') }}" method="POST" novalidate>
            @csrf
            <div class="row">

                {{-- Proyek --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Proyek <span class="text-danger">*</span></label>
                    <select name="proyek_id" class="form-control" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($proyek as $p)
                            <option value="{{ $p->id_proyek }}"
                                {{ old('proyek_id') == $p->id_proyek ? 'selected' : '' }}>
                                {{ $p->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Nama Tahapan --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Tahapan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_tahap" class="form-control"
                        value="{{ old('nama_tahap') }}" required>
                </div>

                {{-- Target Persen --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Target (%) <span class="text-danger">*</span></label>
                    <input type="number" name="target_persen" class="form-control"
                        min="0" max="100" value="{{ old('target_persen', 0) }}" required>
                </div>

                {{-- Tanggal Mulai --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control"
                        value="{{ old('tgl_mulai') }}">
                </div>

                {{-- Tanggal Selesai --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control"
                        value="{{ old('tgl_selesai') }}">
                </div>

            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('tahapan.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

