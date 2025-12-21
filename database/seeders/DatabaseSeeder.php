<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\ProgresProyekSeederFinal;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);

        // $this->call([
        //     CreateFirstUser::class,
        //     ProyekSeeder::class,
        //     TahapanProyekSeeder::class,
        //ProgresProyekSeederFinal::class,
        // ]);
    }
}
