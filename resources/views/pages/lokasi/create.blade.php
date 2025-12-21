@extends('layouts.admin.app')

@section('title', 'Tambah Lokasi')
@section('page', 'Tambah Lokasi')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <h5 class="text-primary mb-4">
                <i class="fa fa-plus me-2"></i>Tambah Lokasi
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

            <form action="{{ route('lokasi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Proyek</label>
                    <select name="id_proyek" class="form-control" required>
                        <option value="">-- Pilih Proyek --</option>
                        @foreach ($proyek as $p)
                            <option value="{{ $p->id_proyek }}">
                                {{ $p->kode_proyek }} - {{ $p->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lokasi" class="form-control" value="{{ old('nama_lokasi') }}" required>
                </div>


                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" name="lat" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" name="lng" class="form-control" required>
                    </div>
                </div>


                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        <i class="fa fa-save me-1"></i>Simpan
                    </button>
                    <a href="{{ route('lokasi.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
