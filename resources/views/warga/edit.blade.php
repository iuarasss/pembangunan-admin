@extends('layouts.admin.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Warga</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: 500;
            color: #003366;
        }

        input, select {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            font-size: 1em;
        }

        input:focus, select:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px #007bff;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button, a {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 6px;
            transition: 0.3s;
        }

        button {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }

        a {
            background: #6c757d;
            color: white;
        }

        a:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Warga</h2>

        <form action="{{ route('warga.update', $warga->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama</label>
            <input type="text" name="nama" value="{{ $warga->nama }}" required>

            <label>NIK</label>
            <input type="text" name="nik" value="{{ $warga->nik }}" required>

            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $warga->alamat }}" required>

            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $warga->no_hp }}" required>

            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>

            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" required>

            <div class="btn-group">
                <button type="submit">💾 Update</button>
                <a href="{{ route('warga.index') }}">⬅ Kembali</a>
            </div>
        </form>
    </div>
</body>
@endsection
