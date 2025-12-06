<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{

    public function index(Request $request)
    {
        $query = Proyek::query();

        // Search
        if ($request->search) {
            $query->where('nama_proyek', 'LIKE', '%' . $request->search . '%');
        }

        // Filter tahun
        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        // Filter status berdasarkan progress
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

    // 2. upload file ke media table
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {

            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/proyek', $fileName);

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
        return view('pages.proyek.edit', compact('proyek'));
    }

    /**
     * Update data proyek
     */
    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek,' . $proyek->id_proyek.',id_proyek',
            'nama_proyek' => 'required',
            'lokasi'      => 'required',
            'tahun'       => 'required|digits:4',
            'anggaran'    => 'required|numeric',
            'progress'    => 'nullable|numeric|min:0|max:100',
        ]);

        $proyek->update($request->all());

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil diperbarui!');
    }

    /**
     * Hapus data proyek
     */
    public function destroy(Proyek $proyek)
    {
        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil dihapus!');
    }

    /**
     * Dashboard admin
     */
    public function dashboard()
    {
        // Ambil data proyek dari database
        $totalProyek     = Proyek::count();
        $totalTahapan    = Proyek::count(); // ubah ini nanti jika tabel tahapan sudah ada
        $rataProgress    = Proyek::avg('progress');
        $kontraktorAktif = Proyek::distinct('kontraktor')->count('kontraktor');

        // Ambil proyek terbaru
        $proyekTerbaru = Proyek::orderBy('created_at', 'desc')->take(5)->get();

        // Kirim ke view
        return view('pages.admin.dashboard', compact(
            'totalProyek',
            'totalTahapan',
            'rataProgress',
            'kontraktorAktif',
            'proyekTerbaru'
        ));
    }

    public function show($id)
{
    // Ambil proyek
    $proyek = Proyek::findOrFail($id);

    // Ambil media terkait proyek
    $media = \App\Models\Media::where('ref_table', 'proyek')
                ->where('ref_id', $id)
                ->orderBy('sort_order', 'asc')
                ->get();

    // Ambil tahapan proyek
    $tahapan = $proyek->tahapan;

    return view('pages.proyek.show', compact('proyek', 'media', 'tahapan'));
}
}
