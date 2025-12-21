<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $query = Proyek::query();

        if ($request->search) {
            $query->where('nama_proyek', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->status) {
            if ($request->status == 'selesai') {
                $query->where('progress', '>=', 100);
            } elseif ($request->status == 'berjalan') {
                $query->where('progress', '>=', 50)->where('progress', '<', 100);
            } elseif ($request->status == 'rencana') {
                $query->where('progress', '<', 50);
            }
        }

        $proyek = $query->paginate(10)->withQueryString();

        return view('pages.proyek.index', compact('proyek'));
    }

    /**
     * Tampilkan form tambah proyek
     */
    public function create()
    {
        return view('pages.proyek.create');
    }

    /**
     * Simpan data proyek baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek',
            'nama_proyek' => 'required',
            'lokasi'      => 'required',
            'tahun'       => 'required|digits:4',
            'anggaran'    => 'required|numeric',
            'progress'    => 'nullable|numeric|min:0|max:100',
        ]);

        // 1. buat proyek
        $proyek = Proyek::create($request->all());

        // 2. upload file ke media table (Disimpan ke storage/app/public/proyek)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('proyek', $fileName, 'public'); // << gunakan disk public

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id'    => $proyek->id_proyek,
                    'file_name' => $fileName,
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit proyek
     */
    public function edit(Proyek $proyek)
    {
        $media = Media::where('ref_table', 'proyek')
            ->where('ref_id', $proyek->id_proyek)
            ->get();

        return view('pages.proyek.edit', compact('proyek', 'media'));
    }

    /**
     * Update data proyek + upload media baru
     */
    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek,' . $proyek->id_proyek . ',id_proyek',
            'nama_proyek' => 'required',
            'lokasi'      => 'required',
            'tahun'       => 'required|digits:4',
            'anggaran'    => 'required|numeric',
            'progress'    => 'nullable|numeric|min:0|max:100',
        ]);

        // Update data proyek
        $proyek->update($request->all());

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('proyek', $fileName, 'public'); // cukup gitu
                                                               // Menyimpan ke public disk

                Media::create([
                    'ref_table' => 'proyek',
                    'ref_id'    => $proyek->id_proyek,
                    'file_name' => $fileName,
                    'mime_type' => $file->getMimeType(),
                ]);
            }
        }

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil diperbarui!');
    }

    /**
     * Hapus data proyek
     */
    public function destroy(Proyek $proyek)
    {
        // Hapus media terkait dan file fisik
        $media = Media::where('ref_table', 'proyek')
            ->where('ref_id', $proyek->id_proyek)
            ->get();

        foreach ($media as $m) {
            Storage::delete('storage/app/public/proyek' . $m->file_name); // Hapus file fisik dari storage/app/public
            $m->delete();
        }

        // Hapus proyek
        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil dihapus!');
    }

    /**
     * Dashboard admin
     */
    public function dashboard()
    {
        // Pastikan model yang digunakan sudah benar
        $totalProyek     = Proyek::count();
        $totalTahapan    = Proyek::count(); // Mungkin perlu diubah jika ada model Tahapan terpisah
        $rataProgress    = Proyek::avg('progress');
        $kontraktorAktif = Proyek::distinct('kontraktor')->count('kontraktor');

        $proyekTerbaru = Proyek::orderBy('created_at', 'desc')->take(5)->get();

        return view('pages.admin.dashboard', compact(
            'totalProyek',
            'totalTahapan',
            'rataProgress',
            'kontraktorAktif',
            'proyekTerbaru'
        ));
    }

    /**
     * Detail proyek
     */
    public function show($id)
    {
        $proyek = Proyek::findOrFail($id);

        // Ambil media terkait proyek
        $media = Media::where('ref_table', 'proyek')
            ->where('ref_id', $id)
            ->orderBy('sort_order', 'asc') // Asumsi kolom sort_order ada
            ->get();

        return view('pages.proyek.show', compact('proyek', 'media'));
    }
}
