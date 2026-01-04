<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontraktor;
use App\Models\Proyek;
use Faker\Factory as Faker;

class KontraktorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID proyek
        $proyekIds = Proyek::pluck('id_proyek')->toArray();

        // Kalau belum ada proyek, hentikan
        if (count($proyekIds) === 0) {
            $this->command->warn('Seeder Kontraktor dibatalkan: data proyek kosong');
            return;
        }

        for ($i = 1; $i <= 100; $i++) {
            Kontraktor::create([
                'id_proyek'         => $faker->randomElement($proyekIds),
                'nama_kontraktor'   => 'PT ' . $faker->company,
                'penanggung_jawab'  => $faker->name,
                'kontak'            => $faker->phoneNumber,
                'alamat'            => $faker->address,
            ]);
        }
    }
}
