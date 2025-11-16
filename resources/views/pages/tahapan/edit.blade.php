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

        {{-- Form Edit --}}
        <form action="{{ route('tahapan.update', $tahapan->tahap_id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div class="row">

                {{-- PROYEK --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Proyek <span class="text-danger">*</span></label>
                    <select name="proyek_id" class="form-select" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($proyek as $p)
                            <option value="{{ $p->id_proyek }}"
                                {{ $p->id_proyek == $tahapan->proyek_id ? 'selected' : '' }}>
                                {{ $p->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- NAMA TAHAP --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Tahapan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_tahap" class="form-control"
                        value="{{ old('nama_tahap', $tahapan->nama_tahap) }}" required>
                </div>

                {{-- TARGET PERSEN --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Target Persen (%)</label>
                    <input type="number" name="target_persen" class="form-control"
                        step="0.01" min="0" max="100"
                        value="{{ old('target_persen', $tahapan->target_persen) }}">
                </div>

                {{-- TGL MULAI --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control"
                        value="{{ old('tgl_mulai', $tahapan->tgl_mulai) }}">
                </div>

                {{-- TGL SELESAI --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control"
                        value="{{ old('tgl_selesai', $tahapan->tgl_selesai) }}">
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
