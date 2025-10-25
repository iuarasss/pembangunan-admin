<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Proyek - Tambah Proyek</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Sidebar -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ url('dashboard') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hard-hat me-2"></i>E-Proyek</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle object-fit-cover" src="{{ asset('assets-admin/img/user.jpg') }}"
                            alt="Ayu Sara" style="width: 60px; height: 60px; border: 2px solid #fff;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Ayu Sara</h6>
                        <span>Admin</span>
                    </div>
                </div>

                <div class="navbar-nav w-100">
                    <a href="{{ url('dashboard') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('proyek.index') }}" class="nav-item nav-link active"><i class="fa fa-building me-2"></i>Proyek</a>
                </div>
            </nav>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="text-primary mb-0"><i class="fa fa-plus me-2"></i>Tambah Proyek</h5>
                        <a href="{{ route('proyek.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left me-1"></i>Kembali</a>
                    </div>

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('proyek.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kode Proyek <span class="text-danger">*</span></label>
                                <input type="text" name="kode_proyek" class="form-control" value="{{ old('kode_proyek') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Proyek <span class="text-danger">*</span></label>
                                <input type="text" name="nama_proyek" class="form-control" value="{{ old('nama_proyek') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tahun <span class="text-danger">*</span></label>
                                <input type="number" name="tahun" class="form-control" value="{{ old('tahun', date('Y')) }}" min="2000" max="{{ date('Y') + 10 }}" required>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Anggaran (Rp) <span class="text-danger">*</span></label>
                                <input type="number" name="anggaran" class="form-control" value="{{ old('anggaran') }}" min="0" step="1000" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Sumber Dana</label>
                                <input type="text" name="sumber_dana" class="form-control" value="{{ old('sumber_dana') }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Progress (%)</label>
                                <input type="number" name="progress" class="form-control" min="0" max="100" value="{{ old('progress', 0) }}">
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-1"></i>Simpan Perubahan
                            </button>
                            <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
