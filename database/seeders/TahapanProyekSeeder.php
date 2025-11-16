<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahapanProyekSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tahapan_proyek')->insert([
            ['proyek_id' => 1, 'nama_tahap' => 'Perencanaan',  'target_persen' => 10, 'tgl_mulai' => '2025-01-01', 'tgl_selesai' => '2025-01-10'],
            ['proyek_id' => 1, 'nama_tahap' => 'Pembangunan',  'target_persen' => 50, 'tgl_mulai' => '2025-02-01', 'tgl_selesai' => '2025-05-01'],
        ]);
    }
}
