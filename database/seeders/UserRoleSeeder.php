<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administratorRole = Role::find(1);
        $administratorUser = User::find(1);

        $administratorUser->attachRole($administratorRole);
    }
}
