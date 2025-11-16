@extends('layouts.admin.app')

@section('title', 'Edit Tahapan Proyek')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-primary mb-0">
                <i class="fa fa-edit me-2"></i>Edit Tahapan Proyek
            </h5>
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

        {{-- Form Edit Tahapan --}}
        <form action="{{ route('tahapan.update', $tahapan->tahap_id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div class="row">
                {{-- PILIH PROYEK --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Proyek <span class="text-danger">*</span></label>
                    <select name="id_proyek" class="form-select" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($proyek as $p)
                            <option value="{{ $p->id_proyek }}"
                                {{ $p->id_proyek == $tahapan->id_proyek ? 'selected' : '' }}>
                                {{ $p->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- NAMA TAHAPAN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Tahapan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_tahapan" class="form-control"
                        value="{{ old('nama_tahapan', $tahapan->nama_tahapan) }}" required>
                </div>

                {{-- TANGGAL MULAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-control"
                        value="{{ old('tanggal_mulai', $tahapan->tanggal_mulai) }}" required>
                </div>

                {{-- TANGGAL SELESAI --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_selesai" class="form-control"
                        value="{{ old('tanggal_selesai', $tahapan->tanggal_selesai) }}" required>
                </div>

                {{-- STATUS --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Belum Mulai" {{ $tahapan->status == 'Belum Mulai' ? 'selected' : '' }}>Belum Mulai</option>
                        <option value="Sedang Berjalan" {{ $tahapan->status == 'Sedang Berjalan' ? 'selected' : '' }}>Sedang Berjalan</option>
                        <option value="Selesai" {{ $tahapan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                {{-- KETERANGAN --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan', $tahapan->keterangan) }}</textarea>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Update
                </button>
                <a href="{{ route('tahapan.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
