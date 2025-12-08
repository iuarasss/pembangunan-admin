<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ProyekSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CreateFirstUser;
use Database\Seeders\TahapanProyekSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'Admin',
        ]);

        // $this->call([
        //     CreateFirstUser::class,
        //     ProyekSeeder::class,
        //     TahapanProyekSeeder::class,
        // ]);
    }
}
