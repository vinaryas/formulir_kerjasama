<?php

namespace Database\Seeders;

use App\Models\JenisKerjasama;
use Illuminate\Database\Seeder;

class JenisKerjasamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisKerjasama = [
            [
                'id' => 1,
                'kerjasama' => 'Bipartit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'kerjasama' => 'Tripartit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($jenisKerjasama as $kerjasama) {
            JenisKerjasama::updateOrCreate([
                'id' => $kerjasama['id']
            ], $kerjasama);
        }
    }
}
