@extends('layouts.admin.app')

@section('page', 'Edit User')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="text-primary mb-0"><i class="fa fa-edit me-2"></i>Edit User</h5>
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

            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="admin" @selected(old('role', $user->role) == 'admin')>Admin</option>
                            <option value="guest" @selected(old('role', $user->role) == 'guest')>Guest</option>
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Kosongkan jika tidak diubah">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Kosongkan jika tidak diubah">
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

                <div class="mt-3">
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="fa fa-save me-1"></i> Update
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
