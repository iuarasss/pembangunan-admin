<?php
namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ref_table' => 'required',
            'ref_id'    => 'required|numeric',
            'files.*'   => 'required|file|max:20480', // 20MB
        ]);

        foreach ($request->file('files') as $file) {

            $name = time() . '_' . $file->getClientOriginalName();

            $folder = $request->ref_table; // ex: proyek atau tahapan_proyek

            $file->storeAs("public/$folder", $name);

            Media::create([
                'ref_table' => $request->ref_table,
                'ref_id'    => $request->ref_id,
                'file_name' => $name,
                'mime_type' => $file->getClientMimeType(),
            ]);
        }

        return back()->with('success', 'File berhasil diupload!');
    }

    public function show($id)
    {
        $proyek = Proyek::findOrFail($id);

        // Ambil semua media yang terhubung dengan proyek ini
        $media = Media::where('ref_table', 'proyek')
        . where('ref_id', $id)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('pages.proyek.show', compact('proyek', 'media'));
    }
}
