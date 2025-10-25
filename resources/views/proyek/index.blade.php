@extends('layouts.admin.app')
@section('content')
        <!-- start main content -->
        <div class="content">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4 shadow-sm">


                    <!--Start header content-->
                    @include('layouts.admin.header')
                    <!--End header content-->

                    <!--Start alert-->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <!--End alert-->

                    <!--Start table-->
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Proyek</th>
                                    <th>Lokasi</th>
                                    <th>Tahun</th>
                                    <th>Anggaran</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($proyek as $proyek)
                                    <tr>
                                        <td>{{ $proyek->kode_proyek }}</td>
                                        <td>

                                            <strong>{{ $proyek->nama_proyek }}</strong><br>
                                            <small>{{ $proyek->sumber_dana }}</small>
                    </div>

                </div>
                </td>
                <td>{{ $proyek->lokasi }}</td>
                <td>{{ $proyek->tahun }}</td>
                <td>Rp{{ number_format($proyek->anggaran, 0, ',', '.') }}</td>
                <td>
                    @if ($proyek->progress >= 100)
                        <span class="status-badge status-full">Selesai</span>
                    @elseif ($proyek->progress >= 50)
                        <span class="status-badge status-part">Berjalan</span>
                    @else
                        <span class="status-badge bg-secondary text-white">Rencana</span>
                    @endif
                </td>
                <td class="text-center action-btns">
                    <a href="{{ route('proyek.edit', $proyek->id_proyek) }}" class="btn btn-outline-success btn-sm"
                        title="Edit"><i class="fa fa-pen"></i></a>
                    <form action="{{ route('proyek.destroy', $proyek->id_proyek) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus proyek ini?')" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data proyek.</td>
                </tr>
                @endforelse
                </tbody>
                </table>

                <!--End table-->
            </div>
        </div>
        <!--End main content-->
@endsection
