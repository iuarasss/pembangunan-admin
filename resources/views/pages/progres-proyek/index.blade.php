@extends('layouts.admin.app')

@section('title', 'Progress Proyek')
@section('page', 'Progress Proyek')
@section('page-title', 'Index Progress Proyek')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">

            <div class="d-flex justify-content-between mb-3">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="text-primary mb-0">
                        <i class="fa fa-chart-line me-2"></i>Daftar Progress Proyek
                    </h5>

                </div>

                <a href="{{ route('progres-proyek.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-1"></i>Tambah Progress
                </a>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Proyek</th>
                            <th>Persen Realisasi</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td class="text-start">{{ $item->proyek->nama_proyek }}</td>
                                <td>{{ $item->persen_real }}%</td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                                <td class="text-start">{{ $item->catatan }}</td>
                                <td>
                                    <a href="{{ route('progres-proyek.edit', $item->progres_id) }}"
                                        class="btn btn-outline-success btn-sm">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="{{ route('progres-proyek.destroy', $item->progres_id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus data progress?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted">Belum ada progress.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
