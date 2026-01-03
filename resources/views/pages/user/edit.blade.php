@extends('layouts.admin.app')

@section('title', 'Profil Saya')
@section('page-title', 'Profil Saya')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">

        <h5 class="mb-3">Edit Profil</h5>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-4 text-center">
                    <img src="{{ $user->photo
                        ? asset('storage/'.$user->photo)
                        : asset('assets/img/user.png') }}"
                        class="rounded-circle mb-3" width="150">

                    <input type="file" name="photo" class="form-control">
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Password Baru (opsional)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button class="btn btn-primary">
                        <i class="fa fa-save me-1"></i>Simpan
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
