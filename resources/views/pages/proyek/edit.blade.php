@extends('layouts.admin.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-primary mb-0">
                <i class="fa fa-edit me-2"></i>Edit Proyek
            </h5>
            <a href="{{ route('proyek.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left me-1"></i>Kembali
            </a>
        </div>

        {{-- Validasi Error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Edit --}}
        <form action="{{ route('proyek.update', $proyek->id_proyek) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kode Proyek <span class="text-danger">*</span></label>
                    <input type="text" name="kode_proyek" class="form-control"
                        value="{{ old('kode_proyek', $proyek->kode_proyek) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Proyek <span class="text-danger">*</span></label>
                    <input type="text" name="nama_proyek" class="form-control"
                        value="{{ old('nama_proyek', $proyek->nama_proyek) }}" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Tahun <span class="text-danger">*</span></label>
                    <input type="number" name="tahun" class="form-control"
                        value="{{ old('tahun', $proyek->tahun) }}" min="2000"
                        max="{{ date('Y') + 10 }}" required>
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control"
                        value="{{ old('lokasi', $proyek->lokasi) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Anggaran (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="anggaran" class="form-control"
                        value="{{ old('anggaran', $proyek->anggaran) }}" min="0" step="1000" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Sumber Dana</label>
                    <input type="text" name="sumber_dana" class="form-control"
                        value="{{ old('sumber_dana', $proyek->sumber_dana) }}">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Progress (%)</label>
                    <input type="number" name="progress" class="form-control" min="0" max="100"
                        value="{{ old('progress', $proyek->progress) }}">
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-warning text-white">
                    <i class="fa fa-save me-1"></i> Update
                </button>
                <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
