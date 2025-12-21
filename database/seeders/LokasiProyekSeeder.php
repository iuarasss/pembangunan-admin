<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiProyekSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua id_proyek
        $proyekIds = DB::table('proyek')->pluck('id_proyek');

        // Kosongkan tabel
        DB::table('lokasi_proyek')->truncate();

        foreach ($proyekIds as $idProyek) {
            DB::table('lokasi_proyek')->insert([
                'id_proyek'  => $idProyek,
                'lat'        => -0.5 + (rand(0, 1000) / 1000),   // sekitar Indonesia
                'lng'        => 101 + (rand(0, 1000) / 1000),
                'geojson'    => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
