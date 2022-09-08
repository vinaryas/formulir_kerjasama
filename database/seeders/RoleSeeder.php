<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Roles = [
            [
                'id' => 1,
                'name' => 'administrator',
                'display_name' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'unit',
                'display_name' => 'Unit',
                'description' => 'unit_pic',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'reviewer',
                'display_name' => 'Reviewer',
                'description' => 'reviewer',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'kepala_unit',
                'display_name' => 'Kepala Unit',
                'description' => 'kepala_unit',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'wakil_dekan',
                'display_name' => 'Wakil Dekan',
                'description' => 'wakil_dekan',
                'created_at' => now(),
                'update_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'dekan',
                'display_name' => 'Dekan',
                'description' => 'dekan',
                'created_at' => now(),
                'update_at' => now(),
            ],
        ];

        foreach ($Roles as $Role) {
            Role::updateOrCreate([
                'id' => $Role['id']
            ], $Role);
        }
    }
}
