<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CreateFirstUser extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Bersihkan tabel dulu biar tidak double
        DB::table('users')->truncate();

        // Tambah 1 Admin
        DB::table('users')->insert([
            'name'       => 'Administrator',
            'email'      => 'admin@example.com',
            'password'   => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambah 99 User Indonesia
        for ($i = 1; $i <= 99; $i++) {
            DB::table('users')->insert([
                'name'       => $faker->name,
                'email'      => $faker->unique()->safeEmail,
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
