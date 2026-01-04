<?php

namespace App\Http\Controllers;

use App\Models\LokasiProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // =========================
    // INDEX + SEARCH + FILTER + PAGINATION
    // =========================
    public function index(Request $request)
    {
        $query = LokasiProyek::with('proyek');

        // 🔍 SEARCH nama proyek
        if ($request->filled('search')) {
            $query->whereHas('proyek', function ($q) use ($request) {
                $q->where('nama_proyek', 'like', '%' . $request->search . '%');
            });
        }

        // 🎯 FILTER lokasi
        if ($request->filled('filter')) {
            if ($request->filter === 'lengkap') {
                $query->whereNotNull('lat')->whereNotNull('lng');
            } elseif ($request->filter === 'kosong') {
                $query->where(function ($q) {
                    $q->whereNull('lat')->orWhereNull('lng');
                });
            }
        }

        $lokasi = $query
            ->orderBy('lokasi_id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.lokasi.index', compact('lokasi'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        $proyek = Proyek::orderBy('id_proyek', 'asc')->get();
        return view('pages.lokasi.create', compact('proyek'));
    }

    // =========================
    // STORE (HANYA SIMPAN DATA)
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'id_proyek' => 'required|exists:proyek,id_proyek',
            'lat'       => 'required|numeric',
            'lng'       => 'required|numeric',
        ]);

        LokasiProyek::create([
            'id_proyek' => $request->id_proyek,
            'lat'       => $request->lat,
            'lng'       => $request->lng,
        ]);

        return redirect()
            ->route('lokasi.index')
            ->with('success', 'Lokasi proyek berhasil ditambahkan');
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $data   = LokasiProyek::findOrFail($id);
        $proyek = Proyek::orderBy('id_proyek', 'asc')->get();

        return view('pages.lokasi.edit', compact('data', 'proyek'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        $lokasi = LokasiProyek::findOrFail($id);
        $lokasi->update($request->only('lat', 'lng'));

        return redirect()
            ->route('lokasi.index')
            ->with('success', 'Data lokasi berhasil diperbarui');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        LokasiProyek::findOrFail($id)->delete();

        return redirect()
            ->route('lokasi.index')
            ->with('success', 'Data lokasi berhasil dihapus');
    }
}

