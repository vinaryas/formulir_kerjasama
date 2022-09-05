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
        $roles = [
            [
                'id' => 1,
                'name' => 'administrator',
                'display_name' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Role::upsert($roles, ['id'], ['name', 'display_name']);
    }
}
