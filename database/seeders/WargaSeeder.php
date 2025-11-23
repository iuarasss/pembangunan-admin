<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            DB::table('warga')->insert([
                'nama'           => $faker->name,
                'nik'            => $faker->unique()->numerify('##########') . rand(10000000, 99999999),
                'alamat'         => $faker->address,
                'no_hp'          => $faker->phoneNumber,
                'jenis_kelamin'  => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_lahir'  => $faker->date('Y-m-d', '2010-01-01'),
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
