<?php

namespace Database\Seeders;

use App\Models\MappingApp as ModelsMappingApp;
use Illuminate\Database\Seeder;

class MappingApp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MappingApps = [
            [
                'id' => 1,
                'role_id' => 1,
                'position' => 1,
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 2,
                'role_id' => 2,
                'position' => 2,
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 3,
                'role_id' => 3,
                'position' => 3,
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 4,
                'role_id' => 4,
                'position' => 4,
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 5,
                'role_id' => 5,
                'position' => 5,
                'created_at' => now(),
                'update_at' => now(),
            ],
        ];

        foreach ($MappingApps as $MappingApp) {
            ModelsMappingApp::updateOrCreate([
                'id' => $MappingApp['id']
            ], $MappingApp);
        }
    }
}
