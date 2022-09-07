<?php

namespace Database\Seeders;

use App\Models\RencanaFormalisasi;
use Illuminate\Database\Seeder;

class RencanaFormalisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RencanaFormalisasi = [
            [
                'id' => 1,
                'rencana' => 'Desk to desk',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 2,
                'rencana' => 'Ceremonial',
                'created_at' => now(),
                'update_at' => now(),
            ],
        ];

        foreach ($RencanaFormalisasi as $rencana) {
            RencanaFormalisasi::updateOrCreate([
                'id' => $rencana['id']
            ], $rencana);
        }
    }
}
