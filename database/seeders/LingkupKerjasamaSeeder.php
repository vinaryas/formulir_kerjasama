<?php

namespace Database\Seeders;

use App\Models\LingkupKerjasama;
use Illuminate\Database\Seeder;

class LingkupKerjasamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lingkupKerjasama = [
            [
                'id' => 1,
                'lingkup' => 'Tri Dharma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'lingkup' => 'Penelitian Luar Negeri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'lingkup' => 'Kerjasama Lab',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($lingkupKerjasama as $lingkup) {
            LingkupKerjasama::updateOrCreate([
                'id' => $lingkup['id']
            ], $lingkup);
        }
    }
}
