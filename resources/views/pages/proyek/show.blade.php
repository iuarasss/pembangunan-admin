@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Detail Proyek: {{ $proyek->nama_proyek }}</h2>
    <hr>

    {{-- INFO PROYEK --}}
    <div class="mb-4">
        <p><strong>Kode Proyek:</strong> {{ $proyek->kode_proyek }}</p>
        <p><strong>Tahun:</strong> {{ $proyek->tahun }}</p>
        <p><strong>Lokasi:</strong> {{ $proyek->lokasi }}</p>
        <p><strong>Anggaran:</strong> Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</p>
        <p><strong>Progress:</strong> {{ $proyek->progress }}%</p>
        <p><strong>Deskripsi:</strong></p>
        <p>{!! nl2br(e($proyek->deskripsi)) !!}</p>
    </div>

    <hr>

    {{-- MEDIA PROYEK --}}
    <h4 class="mb-3">Media Proyek</h4>

    @if($media->count() == 0)
        <p class="text-muted">Belum ada media yang di-upload.</p>
    @else
        <div class="row">
            @foreach ($media as $m)
                <div class="col-md-3 col-sm-6 mb-4">

                    {{-- FILE GAMBAR --}}
                    @if(str_starts_with($m->mime_type, 'image/'))
                        <img src="{{ asset('storage/' . $m->file_name) }}"
                             class="img-fluid rounded shadow">

                    {{-- FILE PDF --}}
                    @elseif($m->mime_type === 'application/pdf')
                        <a href="{{ asset('storage/' . $m->file_name) }}" target="_blank">
                            <div class="p-3 text-center rounded border">
                                <i class="bi bi-filetype-pdf" style="font-size:40px;color:red;"></i>
                                <p>{{ $m->file_name }}</p>
                            </div>
                        </a>

                    {{-- FILE LAINNYA (doc, xlsx, dll) --}}
                    @else
                        <a href="{{ asset('storage/' . $m->file_name) }}" target="_blank">
                            <div class="p-3 text-center rounded border">
                                <i class="bi bi-file-earmark-text" style="font-size:40px;"></i>
                                <p>{{ $m->file_name }}</p>
                            </div>
                        </a>
                    @endif

                </div>
            @endforeach
        </div>
    @endif

    <hr>

    {{-- TAHAPAN --}}
    <h4 class="mt-4">Tahapan Proyek</h4>

    @if($tahapan->count() == 0)
        <p class="text-muted">Belum ada tahapan.</p>
    @else
        <ul>
            @foreach($tahapan as $t)
                <li>
                    <strong>{{ $t->nama_tahap }}</strong> — Target: {{ $t->target_persen }}%
                    <br>
                    <small>{{ $t->tgl_mulai }} s/d {{ $t->tgl_selesai }}</small>
                </li>
            @endforeach
        </ul>
    @endif

</div>
@endsection
