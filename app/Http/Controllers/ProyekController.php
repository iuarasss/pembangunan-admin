<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $proyek = Proyek::all();                         // Ambil semua data proyek
        return view('proyek.create', compact('proyek')); // Kirim ke view

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('proyek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyek',
            'nama_proyek' => 'required',
            'tahun'       => 'required|numeric',
            'lokasi'      => 'required',
            'anggaran'    => 'required|numeric',
            'sumber_dana' => 'required',
            'deskripsi'   => 'required',
            'progress'    => 'nullable|numeric|min:0|max:100',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil ditambahkan!');
    }
/**
 * Display the specified resource.
 */
    public function show(string $id)
    {
        //
    }

/**
 * Show the form for editing the specified resource.
 */
    public function edit(string $id)
    {
        //
    }

/**
 * Update the specified resource in storage.
 */
    public function update(Request $request, string $id)
    {

    }

/**
 * Remove the specified resource from storage.
 */
    public function destroy(string $id)
    {
        //
    }
}
