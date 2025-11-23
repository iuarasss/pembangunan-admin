<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Tahapan;
use Illuminate\Http\Request;

class TahapanController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Tahapan::with('proyek');

        if ($request->search) {
            $query->where('nama_tahap', 'like', '%' . $request->search . '%')
                ->orWhereHas('proyek', function ($q) use ($request) {
                    $q->where('nama_proyek', 'like', '%' . $request->search . '%');
                });
        }

        if ($request->proyek_id) {
            $query->where('proyek_id', $request->proyek_id);
        }

        $tahapan = $query->paginate(10)->appends($request->query());
        $proyek  = \App\Models\Proyek::all();

        return view('pages.tahapan.index', compact('tahapan', 'proyek'));
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
