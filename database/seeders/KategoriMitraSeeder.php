<?php

namespace Database\Seeders;

use App\Models\KategoriMitra;
use Illuminate\Database\Seeder;

class KategoriMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriMitra = [
            [
                'id' => 1,
                'kategori' => 'Perusahaan multinasional',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 2,
                'kategori' => 'Perusahaan nasional berstandar tinggi',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 3,
                'kategori' => 'Perusahaan rintisan (startup company)',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 4,
                'kategori' => 'Organisasi nirlaba kelas dunia',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 5,
                'kategori' => 'Institusi/Organisasi multilateral',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 6,
                'kategori' => 'Perguruan tinggi yang masuk dalam daftar QS100 berdasarkan ilmu',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 7,
                'kategori' => 'Instansi pemerintah (BUMN/BUMD)',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 8,
                'kategori' => 'Rumah sakit',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 9,
                'kategori' => 'UMKM',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 10,
                'kategori' => 'Dunia Usaha',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 11,
                'kategori' => 'Institusi Pendidikan',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 12,
                'kategori' => 'Organisasi/Perusahaan lainnya',
                'created_at' => now(),
                'update_at' => now(),
            ],
        ];

        foreach ($kategoriMitra as $kategori) {
            KategoriMitra::updateOrCreate([
                'id' => $kategori['id']
            ], $kategori);
        }
    }
}
