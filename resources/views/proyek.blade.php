<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Proyek</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">📊 Monitoring Proyek Pembangunan</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proyek as $index => $p)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $p['nama'] }}</td>
                                <td>
                                    @if($p['status'] == 'Selesai')
                                        <span class="badge bg-success">{{ $p['status'] }}</span>
                                    @elseif($p['status'] == 'Proses')
                                        <span class="badge bg-warning text-dark">{{ $p['status'] }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $p['status'] }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted text-center">
                &copy; {{ date('Y') }} Sistem Monitoring Proyek
            </div>
        </div>
    </div>

</body>
</html>
