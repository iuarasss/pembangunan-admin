<?php

namespace App\Http\Controllers;

use App\Models\Tahapan;
use App\Models\Proyek;
use Illuminate\Http\Request;

class TahapanController extends Controller
{
    public function index()
    {
        $tahapan = Tahapan::with('proyek')->paginate(10);
        return view('pages.tahapan.index', compact('tahapan'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        return view('pages.tahapan.create', compact('proyek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id'     => 'required|exists:proyek,id_proyek',
            'nama_tahap'    => 'required',
            'target_persen' => 'required|numeric',
            'tgl_mulai'     => 'nullable|date',
            'tgl_selesai'   => 'nullable|date',
        ]);

        Tahapan::create($request->all());

        return redirect()->route('tahapan.index')->with('success', 'Tahapan ditambahkan.');
    }

    public function edit($id)
    {
        $tahapan = Tahapan::findOrFail($id);
        $proyek  = Proyek::all();
        return view('pages.tahapan.edit', compact('tahapan', 'proyek'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'proyek_id'     => 'required|exists:proyek,id_proyek',
            'nama_tahap'    => 'required',
            'target_persen' => 'required|numeric',
            'tgl_mulai'     => 'nullable|date',
            'tgl_selesai'   => 'nullable|date',
        ]);

        $tahapan = Tahapan::findOrFail($id);
        $tahapan->update($request->all());

        return redirect()->route('tahapan.index')->with('success', 'Tahapan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tahapan = Tahapan::findOrFail($id);
        $tahapan->delete();

        return redirect()->route('tahapan.index')->with('success', 'Tahapan berhasil dihapus.');
    }
}
