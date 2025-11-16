<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proyek')->insert([
            [
                'kode_proyek' => 'PRJ001',
                'nama_proyek' => 'Pembangunan Jalan Desa',
                'tahun' => 2025,
                'lokasi' => 'Riau',
                'anggaran' => 500000000,
                'sumber_dana' => 'APBD',
                'deskripsi' => 'Pembangunan jalan utama desa',
                'progress' => 0,
            ]
        ]);
    }
}
