@extends('layouts.admin.app')

@section('title', 'Data User')
@section('page', 'Data User')
@section('page-title', 'Index Data User')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-primary mb-0"><i class="fa fa-users me-2"></i>Data User</h5>
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus me-1"></i>Tambah User
            </a>
        </div>

          <!-- PAGINATION RAPIIII -->
            <div class="d-flex justify-content-end mt-3">
                {{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

        {{-- Search --}}
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Cari nama atau email...">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Cari</button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('user.index') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Tabel user --}}
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th width="120" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $user->id) }}"
                                   class="btn btn-sm btn-warning me-1">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('user.destroy', $user->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
