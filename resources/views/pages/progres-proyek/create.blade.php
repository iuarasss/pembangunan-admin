@extends('layouts.admin.app')

@section('title', 'Tambah Progres Proyek')
@section('page', 'Tambah Progress Proyek')


@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-primary mb-0">
                <i class="fa fa-plus me-2"></i>Tambah Progres Proyek
            </h5>
            <a href="{{ route('progres-proyek.index') }}" class="btn btn-sm btn-secondary">
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

        <form action="{{ route('progres-proyek.store') }}" method="POST">
            @csrf

            <div class="row">
                {{-- Proyek --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Proyek <span class="text-danger">*</span></label>
                    <select name="id_proyek" class="form-select" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($proyek as $p)
                            <option value="{{ $p->id_proyek }}"
                                {{ old('id_proyek') == $p->id_proyek ? 'selected' : '' }}>
                                {{ $p->kode_proyek }} - {{ $p->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tanggal --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control"
                        value="{{ old('tanggal', date('Y-m-d')) }}" required>
                </div>

                {{-- Progress --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Progress Real (%) <span class="text-danger">*</span></label>
                    <input type="number" name="persen_real" class="form-control"
                        min="0" max="100" value="{{ old('persen_real', 0) }}" required>
                </div>

                {{-- Catatan --}}
                <div class="col-12 mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="4">{{ old('catatan') }}</textarea>
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('progres-proyek.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
