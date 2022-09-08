<?php

namespace Database\Seeders;

use App\Models\JenisPengajuan;
use Illuminate\Database\Seeder;

class JenisPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisPengajuan = [
            [
                'id' => 1,
                'pengajuan' => 'Baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'pengajuan' => 'Perpanjang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($jenisPengajuan as $pengajuan) {
            JenisPengajuan::updateOrCreate([
                'id' => $pengajuan['id']
            ], $pengajuan);
        }
    }
}
