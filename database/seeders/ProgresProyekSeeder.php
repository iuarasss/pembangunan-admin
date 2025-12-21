<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgresProyekSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua id_proyek
        $proyekIds = DB::table('proyek')->pluck('id_proyek');

        // Kosongkan tabel agar tidak dobel
        DB::table('progres_proyek')->truncate();

        foreach ($proyekIds as $idProyek) {
            DB::table('progres_proyek')->insert([
                'id_proyek'   => $idProyek,
                'tahap_id'    => null, // bisa diisi kalau tabel tahapan sudah siap
                'persen_real' => rand(10, 100),
                'tanggal'     => Carbon::now()->subDays(rand(1, 90)),
                'catatan'     => 'Progress proyek berjalan sesuai rencana.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
