@extends('layouts.admin.app')

@section('title', 'Data Kontraktor')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="text-primary mb-0">
                    <i class="fa fa-building me-2"></i>Data Kontraktor
                </h5>
                <a href="{{ route('kontraktor.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus me-1"></i>Tambah
                </a>
            </div>
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-4">
        <input type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Cari kontraktor / penanggung jawab...">
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary w-100">
            <i class="fa fa-search me-1"></i>Cari
        </button>
    </div>
</form>

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Kontraktor</th>
                        <th>Penanggung Jawab</th>
                        <th>No. Telp</th>
                        <th>Alamat</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $row->nama_kontraktor }}</td>
                            <td>{{ $row->penanggung_jawab }}</td>
                             <td>{{ $row->kontak }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td class="text-center">

    {{-- Tombol Edit --}}
    <a href="{{ route('kontraktor.edit', $row->kontraktor_id) }}"
        class="btn btn-outline-success btn-sm"
        title="Edit Kontraktor">
        <i class="fa fa-pen"></i>
    </a>

    {{-- Tombol Hapus --}}
    <form action="{{ route('kontraktor.destroy', $row->kontraktor_id) }}"
        method="POST"
        class="d-inline"
        onsubmit="return confirm('Yakin ingin menghapus kontraktor ini?')">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="btn btn-outline-danger btn-sm"
            title="Hapus Kontraktor">
            <i class="fa fa-trash"></i>
        </button>
    </form>

</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Data kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
