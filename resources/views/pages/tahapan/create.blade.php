@extends('layouts.admin.app')

@section('title', 'Tambah Tahapan Proyek')
@section('page', 'Tambah Tahapan Proyek')

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
                        <input type="text" name="nama_tahap" class="form-control" value="{{ old('nama_tahap') }}"
                            required>
                    </div>

                    {{-- Target Persen --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Target (%) <span class="text-danger">*</span></label>
                        <input type="number" name="target_persen" class="form-control" min="0" max="100"
                            value="{{ old('target_persen', 0) }}" required>
                    </div>

                    {{-- Tanggal Mulai --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai" class="form-control" value="{{ old('tgl_mulai') }}">
                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control" value="{{ old('tgl_selesai') }}">
                    </div>


                    <div class="form-group">
                        <label>Upload Dokumen/Foto :</label>
                        <input type="file" name="files[]" multiple class="form-control">
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
