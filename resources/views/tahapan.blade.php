<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahapan Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">📑 Tahapan Proyek Pembangunan</h2>
        </div>
        <div class="card-body">
            <div class="list-group">
                @foreach($tahapan as $step)
                    <div class="list-group-item">
                        <h5 class="mb-1">{{ $step['urutan'] }}. {{ $step['nama'] }}</h5>
                        <p class="mb-1 text-muted">{{ $step['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer text-muted text-center">
            &copy; {{ date('Y') }} Sistem Monitoring Proyek
        </div>
    </div>
</div>

</body>
</html>
