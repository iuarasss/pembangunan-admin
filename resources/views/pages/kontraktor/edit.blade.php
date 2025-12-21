@extends('layouts.admin.app')

@section('title', 'Edit Kontraktor')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="text-primary mb-0">
                <i class="fa fa-edit me-2"></i>Edit Kontraktor
            </h5>
            <a href="{{ route('kontraktor.index') }}" class="btn btn-sm btn-secondary">
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

        <form action="{{ route('kontraktor.update', ['kontraktor' => $data->kontraktor_id]) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Proyek --}}
            <div class="mb-3">
                <label class="form-label">Proyek <span class="text-danger">*</span></label>
                <select name="id_proyek" class="form-control" required>
                    <option value="">-- Pilih Proyek --</option>
                    @foreach ($proyek as $p)
                        <option value="{{ $p->id_proyek }}"
                            {{ old('id_proyek', $data->id_proyek) == $p->id_proyek ? 'selected' : '' }}>
                            {{ $p->nama_proyek }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Kontraktor --}}
            <div class="mb-3">
                <label class="form-label">Nama Kontraktor <span class="text-danger">*</span></label>
                <input type="text"
                       name="nama_kontraktor"
                       class="form-control"
                       value="{{ old('nama_kontraktor', $data->nama_kontraktor) }}"
                       required>
            </div>

            {{-- Penanggung Jawab --}}
            <div class="mb-3">
                <label class="form-label">Penanggung Jawab <span class="text-danger">*</span></label>
                <input type="text"
                       name="penanggung_jawab"
                       class="form-control"
                       value="{{ old('penanggung_jawab', $data->penanggung_jawab) }}"
                       required>
            </div>

            {{-- Kontak --}}
            <div class="mb-3">
                <label class="form-label">Kontak / No. Telepon <span class="text-danger">*</span></label>
                <input type="text"
                       name="kontak"
                       class="form-control"
                       value="{{ old('kontak', $data->kontak) }}"
                       required>
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="3">{{ old('alamat', $data->alamat) }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-warning text-white">
                    <i class="fa fa-save me-1"></i>Update
                </button>
                <a href="{{ route('kontraktor.index') }}" class="btn btn-outline-secondary">
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
