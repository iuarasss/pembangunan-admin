@extends('layouts.admin.app')

@section('title', 'Tambah User')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="text-primary mb-0"><i class="fa fa-plus me-2"></i>Tambah User</h5>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left me-1"></i>Kembali
                </a>
            </div>

            {{-- Validasi error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="col-md-6">
                        <label class="form-label">Role <span class="text-danger">*</span></label>
                        <select name="role" class="form-select" required>
                            <option value="admin" @selected(old('role') == 'admin')>Admin</option>
                            <option value="guest" @selected(old('role') == 'guest')>Guest</option>
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div class="col-md-6">
                        <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Foto User</label>
                        <input type="file" name="photo" class="form-control" accept="image/*"
                            onchange="previewPhoto(event)">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengubah foto
                        </small>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
