@extends('layouts.admin.app')
@section('page', 'Profil Saya')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Profil</h5>
                </div>

                <div class="card-body">

                    {{-- Alert sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name"
                                   class="form-control"
                                   value="{{ old('name', $user->name) }}"
                                   required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                   class="form-control"
                                   value="{{ old('email', $user->email) }}"
                                   required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti password
                            </small>
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        {{-- Foto Profil --}}
                        <div class="mb-3">
                            <label class="form-label">Foto Profil</label>
                            <input type="file" name="photo" class="form-control">

                            @if ($user->photo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $user->photo) }}"
                                         width="120"
                                         class="rounded shadow">
                                </div>
                            @endif
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
