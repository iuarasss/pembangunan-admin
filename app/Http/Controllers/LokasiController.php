<?php
namespace App\Http\Controllers;

use App\Models\LokasiProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = LokasiProyek::with('proyek')->get();

        return view('pages.lokasi.index', compact('lokasi'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyek = Proyek::orderBy('id_proyek', 'asc')->get();
        return view('pages.lokasi.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $query = LokasiProyek::with('proyek');

        // 🔍 SEARCH (nama proyek)
        if ($request->filled('search')) {
            $query->whereHas('proyek', function ($q) use ($request) {
                $q->where('nama_proyek', 'like', '%' . $request->search . '%');
            });
        }

        // 📌 FILTER (punya koordinat / tidak)
        if ($request->filled('filter')) {
            if ($request->filter == 'lengkap') {
                $query->whereNotNull('lat')->whereNotNull('lng');
            } elseif ($request->filter == 'kosong') {
                $query->whereNull('lat')->orWhereNull('lng');
            }
        }

        $lokasi = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.lokasi.index', compact('lokasi'));
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

        return redirect()->route('lokasi-proyek.index')
            ->with('success', 'Lokasi proyek berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     * (tidak digunakan)
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data   = LokasiProyek::findOrFail($id);
        $proyek = Proyek::orderBy('id_proyek', 'asc')->get();

        return view('pages.lokasi.edit', compact('data', 'proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'alamat'     => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $lokasi = LokasiProyek::where('lokasi_id', $id)->firstOrFail();

        $lokasi->update([
            'alamat'     => $request->alamat,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('lokasi.index')
            ->with('success', 'Data lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LokasiProyek::where('lokasi_id', $id)->firstOrFail()->delete();

        return redirect()
            ->route('lokasi.index')
            ->with('success', 'Data lokasi berhasil dihapus');
    }
}
