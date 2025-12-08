@extends('layouts.admin.app')

@section('title', 'Edit Proyek')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="text-primary mb-0">
                    <i class="fa fa-edit me-2"></i>Edit Proyek
                </h5>
                <a href="{{ route('proyek.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-arrow-left me-1"></i>Kembali
                </a>
            </div>

            {{-- Validasi Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Edit. HARUS menggunakan POST dengan method PUT spoofing untuk upload file --}}
            <form action="{{ route('proyek.update', $proyek->id_proyek) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kode Proyek <span class="text-danger">*</span></label>
                        <input type="text" name="kode_proyek" class="form-control"
                            value="{{ old('kode_proyek', $proyek->kode_proyek) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Proyek <span class="text-danger">*</span></label>
                        <input type="text" name="nama_proyek" class="form-control"
                            value="{{ old('nama_proyek', $proyek->nama_proyek) }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tahun <span class="text-danger">*</span></label>
                        <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $proyek->tahun) }}"
                            min="2000" max="{{ date('Y') + 10 }}" required>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="lokasi" class="form-control"
                            value="{{ old('lokasi', $proyek->lokasi) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Anggaran (Rp) <span class="text-danger">*</span></label>
                        <input type="number" name="anggaran" class="form-control"
                            value="{{ old('anggaran', $proyek->anggaran) }}" min="0" step="1000" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sumber Dana</label>
                        <input type="text" name="sumber_dana" class="form-control"
                            value="{{ old('sumber_dana', $proyek->sumber_dana) }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Progress (%)</label>
                        <input type="number" name="progress" class="form-control" min="0" max="100"
                            value="{{ old('progress', $proyek->progress) }}">
                    </div>
                </div>

                <h5>Upload File Pendukung Baru</h5>
                {{-- Field ini hanya untuk upload file BARU, file lama tidak dihilangkan otomatis --}}
                <input type="file" name="files[]" multiple class="form-control mb-4">

                {{-- Tampilkan daftar media yang sudah ada --}}
                <h5 class="mt-4">Media Proyek Saat Ini ({{ $media->count() }})</h5>
                <div class="row g-3 mb-3">
                    @forelse ($media as $m)
                        <div class="col-md-3 col-sm-6">
                            <div class="card h-100 shadow-sm border">
                                <div class="p-2 text-center">
                                    @if (str_starts_with($m->mime_type, 'image/'))
                                        {{-- SINKRONISASI: Menggunakan asset() untuk URL publik --}}
                                        <img src="{{ asset('storage/proyek/' . $m->file_name) }}" class="img-fluid rounded"
                                            style="height:100px; object-fit:cover; width:100%;">
                                    @else
                                        <i class="bi bi-file-earmark-text" style="font-size:40px;"></i>
                                    @endif
                                </div>
                                <div class="px-3 text-center small text-truncate">
                                    {{ $m->file_name }}
                                </div>
                                <div class="p-3">
                                    {{-- SINKRONISASI: Menggunakan asset() untuk URL Lihat/Download --}}
                                    <a href="{{ asset('storage/proyek/' . $m->file_name) }}" target="_blank"
                                        class="btn btn-outline-info btn-sm w-100">Lihat</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-muted">Belum ada media terlampir.</p>
                        </div>
                    @endforelse
                </div>
                {{-- End Tampilkan media --}}

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="fa fa-save me-1"></i> Update
                    </button>
                    <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
