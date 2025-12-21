<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\ProgresProyek;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Daftar kota/kabupaten di Riau
        $lokasiRiau = [
            'Pekanbaru', 'Dumai', 'Siak', 'Bengkalis', 'Rokan Hulu',
            'Rokan Hilir', 'Indragiri Hulu', 'Indragiri Hilir',
            'Kuantan Singingi', 'Pelalawan', 'Kampar', 'Kepulauan Meranti',
        ];

        // Nama proyek khas Indonesia
        $jenisProyek = [
            'Pembangunan Jalan',
            'Rehabilitasi Gedung',
            'Peningkatan Drainase',
            'Pembangunan Jembatan',
            'Pengadaan Sarana Air Bersih',
            'Pembangunan Gedung Sekolah',
            'Renovasi Pasar Tradisional',
            'Normalisasi Sungai',
            'Perbaikan Fasilitas Umum',
            'Pembangunan Puskesmas',
        ];

        for ($i = 1; $i <= 100; $i++) {

            $namaProyek = $faker->randomElement($jenisProyek) . ' ' . $faker->streetName;
            $lokasi     = $faker->randomElement($lokasiRiau);

            $persentase = $faker->numberBetween(0, 100);

            DB::table('proyek')->insert([
                'kode_proyek' => 'PRJ-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_proyek' => $namaProyek,
                'lokasi'      => $lokasi,
                'tahun'       => $faker->numberBetween(2018, 2025),
                'anggaran'    => $faker->numberBetween(50000000, 500000000),
                'sumber_dana' => $faker->randomElement(['APBD', 'APBN', 'Dana Desa', 'CSR', 'Swasta']),
                'deskripsi'   => $faker->paragraph(2, true),
                'progress'    => $persentase,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
    public function progres()
    {
        return $this->hasMany(ProgresProyek::class, 'id_proyek', 'id_proyek');
    }

    public function progresTerakhir()
    {
        return $this->hasOne(ProgresProyek::class, 'id_proyek', 'id_proyek')
            ->latest('tanggal');
    }

}
