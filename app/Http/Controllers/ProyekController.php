<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Tampilkan semua proyek
     */
    public function index()
    {
        $proyek = Proyek::all();
        return view('proyek.index', compact('proyek'));
    }

    /**
     * Tampilkan form tambah proyek
     */
    public function create()
    {
        return view('proyek.create');
    }

    /**
     * Simpan data proyek baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek',
            'nama_proyek' => 'required',
            'lokasi' => 'required',
            'tahun' => 'required|digits:4',
            'anggaran' => 'required|numeric',
            'progress' => 'nullable|numeric|min:0|max:100',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit proyek
     */
    public function edit(Proyek $proyek)
    {

        return view('proyek.edit', compact('proyek'));
    }

    /**
     * Update data proyek
     */
    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyek,kode_proyek,' . $proyek->id,
            'nama_proyek' => 'required',
            'lokasi' => 'required',
            'tahun' => 'required|digits:4',
            'anggaran' => 'required|numeric',
            'progress' => 'nullable|numeric|min:0|max:100',
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

    public function dashboard()
{
    // Ambil data proyek dari database
    $totalProyek = Proyek::count();
    $totalTahapan = Proyek::count(); // kalau kamu punya tabel tahapan terpisah, ubah ini nanti
    $rataProgress = Proyek::avg('progress');
    $kontraktorAktif = Proyek::distinct('kontraktor')->count('kontraktor');

    // Ambil proyek terbaru
    $proyekTerbaru = Proyek::orderBy('created_at', 'desc')->take(5)->get();

    // Kirim ke view
    return view('dashboard', compact(
        'totalProyek',
        'totalTahapan',
        'rataProgress',
        'kontraktorAktif',
        'proyekTerbaru'
    ));
}

}
