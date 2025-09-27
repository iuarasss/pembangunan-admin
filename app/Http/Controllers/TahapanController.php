<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TahapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $tahapan = [
                ['urutan' => 1, 'nama' => 'Perencanaan', 'deskripsi' => 'Analisis kebutuhan, perancangan, dan penganggaran proyek.'],
                ['urutan' => 2, 'nama' => 'Pelaksanaan', 'deskripsi' => 'Proses pembangunan sesuai rencana dan jadwal.'],
                ['urutan' => 3, 'nama' => 'Monitoring', 'deskripsi' => 'Pengawasan jalannya proyek, memastikan sesuai target.'],
                ['urutan' => 4, 'nama' => 'Evaluasi & Selesai', 'deskripsi' => 'Pemeriksaan akhir, laporan hasil, dan serah terima.'],
            ];

            return view('tahapan', compact('tahapan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
