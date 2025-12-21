<?php

namespace App\Http\Controllers;

use App\Models\ProgresProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProgresProyek::with('proyek')
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.progres-proyek.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil data proyek untuk dropdown
        $proyek = Proyek::orderBy('nama_proyek')->get();

        return view('pages.progres-proyek.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_proyek'   => 'required|exists:proyek,id_proyek',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string'
        ]);

        ProgresProyek::create([
            'id_proyek'   => $request->id_proyek,
            'persen_real' => $request->persen_real,
            'tanggal'     => $request->tanggal,
            'catatan'     => $request->catatan,
        ]);

        return redirect()
            ->route('progres-proyek.index')
            ->with('success', 'Data progress proyek berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProgresProyek::with('proyek')
            ->where('progres_id', $id)
            ->firstOrFail();

        return view('pages.progres-proyek.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ProgresProyek::where('progres_id', $id)->firstOrFail();
        $proyek = Proyek::orderBy('nama_proyek')->get();

        return view('pages.progres-proyek.edit', compact('data', 'proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_proyek'   => 'required|exists:proyek,id_proyek',
            'persen_real' => 'required|numeric|min:0|max:100',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string'
        ]);

        $data = ProgresProyek::where('progres_id', $id)->firstOrFail();

        $data->update([
            'id_proyek'   => $request->id_proyek,
            'persen_real' => $request->persen_real,
            'tanggal'     => $request->tanggal,
            'catatan'     => $request->catatan,
        ]);

        return redirect()
            ->route('progres-proyek.index')
            ->with('success', 'Data progress proyek berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ProgresProyek::where('progres_id', $id)->firstOrFail();
        $data->delete();

        return redirect()
            ->route('progres-proyek.index')
            ->with('success', 'Data progress proyek berhasil dihapus');
    }
}
