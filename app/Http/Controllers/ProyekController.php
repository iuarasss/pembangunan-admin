<?php
namespace App\Http\Controllers;

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

        Proyek::create($request->all());

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
            'kode_proyek' => 'required|unique:proyek,kode_proyek,' . $proyek->id,
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
}
