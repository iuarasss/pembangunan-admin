<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Proyek - Data Proyek</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        .table-avatar {
            display: flex;
            align-items: center;
        }

        .table-avatar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-full {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-part {
            background-color: #fef3c7;
            color: #92400e;
        }

        .table thead {
            background: #f8f9fa;
        }

        .action-btns .btn {
            border: none;
            font-size: 0.9rem;
            padding: 5px 8px;
        }

        .action-btns .btn i {
            margin: 0;
        }
    </style>
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
                        <h5 class="text-primary mb-0"><i class="fa fa-list me-2"></i>Data Proyek</h5>
                        <a href="{{ route('proyek.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus me-1"></i>Tambah Proyek
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

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
                                            <a href="{{ route('proyek.edit', $proyek->id_proyek) }}" class="btn btn-outline-success btn-sm" title="Edit"><i class="fa fa-pen"></i></a>
                                            <form action="{{ route('proyek.destroy', $proyek->id_proyek) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus proyek ini?')" title="Hapus">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
