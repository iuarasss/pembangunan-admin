@extends('layouts.admin.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 20px;
        }

        .btn-tambah {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-tambah:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background: #f2f6fa;
        }

        tr:hover {
            background: #eaf2ff;
        }

        .aksi {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn-edit {
            background: #28a745;
            color: white;
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-edit:hover {
            background: #218838;
        }

        .btn-hapus {
            background: #dc3545;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-hapus:hover {
            background: #b02a37;
        }

        .alert {
            text-align: center;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>📋 Data Warga</h2>
        <a href="{{ route('warga.create') }}" class="btn-tambah">+ Tambah Data</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($warga as $w)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $w->nama }}</td>
                        <td>{{ $w->nik }}</td>
                        <td>{{ $w->alamat }}</td>
                        <td>{{ $w->no_hp }}</td>
                        <td>{{ $w->jenis_kelamin }}</td>
                        <td>{{ $w->tanggal_lahir }}</td>
                        <td class="aksi">
                            <a href="{{ route('warga.edit', $w->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('warga.destroy', $w->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="color: #888;">Belum ada data warga.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
@endsection
