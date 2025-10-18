<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4 shadow-sm">
            <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label class="form-label">Kode Proyek</label>
                    <input type="text" name="kode_proyek" class="form-control"
                        value="{{ old('kode_proyek', $proyek->kode_proyek) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Proyek</label>
                    <input type="text" name="nama_proyek" class="form-control"
                        value="{{ old('nama_proyek', $proyek->nama_proyek) }}" required>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-sync me-1"></i>Perbarui</button>
            </form>
        </div>
    </div>
</div>
