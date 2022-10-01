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
                'description' => 'administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'wakil_dekan_satu',
                'display_name' => 'Wakil Dekan 1',
                'description' => 'wakil_dekan_satu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'wakil_dekan_dua',
                'display_name' => 'Wakil Dekan 2',
                'description' => 'wakil_dekan_dua',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'wakil_dekan_tiga',
                'display_name' => 'Wakil Dekan 3',
                'description' => 'wakil_dekan_tiga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'id' => 2,
            //     'name' => 'unit',
            //     'display_name' => 'Unit',
            //     'description' => 'unit_pic',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            [
                'id' => 5,
                'name' => 'reviewer',
                'display_name' => 'Reviewer',
                'description' => 'reviewer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'id' => 4,
            //     'name' => 'kepala_unit',
            //     'display_name' => 'Kepala Unit',
            //     'description' => 'kepala_unit',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id' => 5,
            //     'name' => 'wakil_dekan',
            //     'display_name' => 'Wakil Dekan',
            //     'description' => 'wakil_dekan',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'id' => 6,
            //     'name' => 'dekan',
            //     'display_name' => 'Dekan',
            //     'description' => 'dekan',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
			[
                'id' => 7,
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($Roles as $Role) {
            Role::updateOrCreate([
                'id' => $Role['id']
            ], $Role);
        }
    }
}
