<div class="content">
    <div class="container-fluid pt-4 px-4">
        <a href="{{ route('proyek.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Proyek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyeks as $proyek)
                    <tr>
                        <td>{{ $proyek->kode_proyek }}</td>
                        <td>{{ $proyek->nama_proyek }}</td>
                        <td>
                            <a href="{{ route('proyek.edit', $proyek->id) }}" class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('proyek.destroy', $proyek->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus proyek ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
