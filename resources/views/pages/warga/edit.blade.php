@extends('layouts.admin.app')

@section('content')
<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <h5 class="text-primary mb-4"><i class="fa fa-user-edit me-2"></i>Edit Warga</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('warga.update', $warga->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama', $warga->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control"
                           value="{{ old('nik', $warga->nik) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $warga->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin)
