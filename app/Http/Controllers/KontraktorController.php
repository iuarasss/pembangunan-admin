<?php

namespace App\Http\Controllers;

use App\Models\Kontraktor;
use App\Models\Proyek;
use Illuminate\Http\Request;

class KontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kontraktor::orderBy('nama_kontraktor', 'asc')->get();
        return view('pages.kontraktor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyek = Proyek::orderBy('nama_proyek')->get();
        return view('pages.kontraktor.create', compact('proyek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 $query = Kontraktor::query();

    // 🔍 SEARCH
    if ($request->filled('search')) {
        $query->where('nama_kontraktor', 'like', '%' . $request->search . '%')
              ->orWhere('penanggung_jawab', 'like', '%' . $request->search . '%');
    }

    $data = $query->orderBy('created_at', 'desc')
                  ->paginate(10)
                  ->withQueryString();

    return view('pages.kontraktor.index', compact('data'));

        $validated = $request->validate([
            'id_proyek'         => 'required|exists:proyek,id_proyek',
            'nama_kontraktor'   => 'required|string|max:255',
            'penanggung_jawab'  => 'required|string|max:255',
            'kontak'            => 'required|string|max:50',
            'alamat'            => 'nullable|string',
        ]);

        Kontraktor::create($validated);

        return redirect()
            ->route('kontraktor.index')
            ->with('success', 'Data kontraktor berhasil ditambahkan');
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
    public function edit(string $id)
    {
        $data   = Kontraktor::findOrFail($id);
        $proyek = Proyek::orderBy('nama_proyek')->get();

        return view('pages.kontraktor.edit', compact('data', 'proyek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'id_proyek'         => 'required|exists:proyek,id_proyek',
            'nama_kontraktor'   => 'required|string|max:255',
            'penanggung_jawab'  => 'required|string|max:255',
            'kontak'            => 'required|string|max:50',
            'alamat'            => 'nullable|string',
        ]);

        $kontraktor = Kontraktor::findOrFail($id);
        $kontraktor->update($validated);

        return redirect()
            ->route('kontraktor.index')
            ->with('success', 'Data kontraktor berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kontraktor::findOrFail($id)->delete();

        return redirect()
            ->route('kontraktor.index')
            ->with('success', 'Data kontraktor berhasil dihapus');
    }
}
