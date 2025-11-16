@extends('layouts.admin.app')

@section('title', 'Data Tahapan Proyek')
@section('page', 'Tahapan Proyek')
@section('page-title', 'Index Data Tahapan Proyek')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4 shadow-sm">

        <!-- Header Halaman -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Daftar Tahapan Proyek</h5>
            <a href="{{ route('tahapan.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Tambah Tahapan
            </a>
        </div>

        <!-- Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Tabel Tahapan Proyek -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Proyek</th>
                        <th>Nama Tahapan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tahapan as $item)
                        <tr>
                            <td class="text-start">
                                <strong>{{ $item->proyek->nama_proyek }}</strong><br>
                                <small class="text-muted">{{ $item->proyek->kode_proyek }}</small>
                            </td>

                            <td class="text-start">{{ $item->nama_tahap }}</td>

                            <td>{{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y') }}</td>

                            <td>{{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y') }}</td>

                            <td>
                                @if ($item->status == 'Selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif ($item->status == 'Sedang Berjalan')
                                    <span class="badge bg-warning text-dark">Berjalan</span>
                                @else
                                    <span class="badge bg-secondary">Belum Mulai</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('tahapan.edit', $item->tahap_id) }}"
                                    class="btn btn-outline-success btn-sm" title="Edit">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <form action="{{ route('tahapan.destroy', $item->tahap_id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus tahapan ini?')"
                                        title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data tahapan proyek.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- End Tabel -->

    </div>
</div>
@endsection
