<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TahapanProyekSeeder extends Seeder
{
    public function run()
    {
        $proyekIds = DB::table('proyek')->pluck('id_proyek');

        DB::table('tahapan_proyek')->truncate();

        $tahapanList = [
            "Perencanaan Awal",
            "Survey Lokasi",
            "Penyusunan RAB",
            "Pelaksanaan",
            "Monitoring",
            "Penyelesaian Proyek"
        ];

        foreach ($proyekIds as $proyekId) {

            // Pilih 1 nama tahapan untuk 1 proyek
            $namaTahap = $tahapanList[array_rand($tahapanList)];

            // Tanggal acak
            $tglMulai = Carbon::today()->subDays(rand(30, 120));
            $tglSelesai = (clone $tglMulai)->addDays(rand(10, 40));

            DB::table('tahapan_proyek')->insert([
                'proyek_id'      => $proyekId,
                'nama_tahap'     => $namaTahap,
                'target_persen'  => rand(20, 100), // nilai tahapan
                'tgl_mulai'      => $tglMulai,
                'tgl_selesai'    => $tglSelesai,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
