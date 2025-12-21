@extends('layouts.admin.app')

@section('title', 'Edit Lokasi')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">
        <h5 class="text-primary mb-4">
            <i class="fa fa-edit me-2"></i>Edit Lokasi
        </h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lokasi.update', $data->lokasi_id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Lokasi <span class="text-danger">*</span></label>
                <input type="text" name="nama_lokasi" class="form-control"
                       value="{{ old('nama_lokasi', $data->nama_lokasi) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3">{{ old('alamat', $data->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $data->keterangan) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-warning text-white">
                    <i class="fa fa-save me-1"></i>Update
                </button>
                <a href="{{ route('lokasi.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
