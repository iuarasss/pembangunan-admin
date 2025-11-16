<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProyekSeeder;
use Database\Seeders\CreateFirstUser;
use Database\Seeders\TahapanProyekSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CreateFirstUser::class,
            ProyekSeeder::class,
            TahapanProyekSeeder::class,
        ]);
    }
}
