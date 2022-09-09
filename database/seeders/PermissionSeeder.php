<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'parent_id' => 0,
                'name' => 'dashboard',
                'display_name' => 'Dashboard',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'name' => 'auth',
                'display_name' => 'Otorisasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'name' => 'user',
                'display_name' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'parent_id' => 3,
                'name' => 'list-user',
                'display_name' => 'Data User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'parent_id' => 3,
                'name' => 'add-user',
                'display_name' => 'Tambah User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'parent_id' => 3,
                'name' => 'update-user',
                'display_name' => 'Ubah User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'parent_id' => 3,
                'name' => 'delete-user',
                'display_name' => 'Hapus User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'parent_id' => 2,
                'name' => 'role',
                'display_name' => 'Role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'parent_id' => 8,
                'name' => 'list-role',
                'display_name' => 'List Role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'parent_id' => 8,
                'name' => 'add-role',
                'display_name' => 'Tambah Role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'parent_id' => 8,
                'name' => 'update-role',
                'display_name' => 'Ubah Role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'parent_id' => 8,
                'name' => 'delete-role',
                'display_name' => 'Hapus Role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'parent_id' => 8,
                'name' => 'update-role-pms',
                'display_name' => 'Mengubah Role Permission',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 14,
                'parent_id' => 0,
                'name' => 'master-data',
                'display_name' => 'Master Data',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 15,
                'parent_id' => 14,
                'name' => 'jenis-barang',
                'display_name' => 'Jenis Barang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 16,
                'parent_id' => 14,
                'name' => 'tipe-barang',
                'display_name' => 'Tipe Barang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 17,
                'parent_id' => 14,
                'name' => 'barang',
                'display_name' => 'Barang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 18,
                'parent_id' => 0,
                'name' => 'peminjaman',
                'display_name' => 'Peminjaman Barang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 19,
                'parent_id' => 0,
                'name' => 'persetujuan-peminjaman',
                'display_name' => 'Persetujuan Peminjaman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 20,
                'parent_id' => 0,
                'name' => 'pengembalian',
                'display_name' => 'Pengembalian Barang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 21,
                'parent_id' => 0,
                'name' => 'perpanjangan',
                'display_name' => 'Perpanjangan Peminjaman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
			[
                'id' => 22,
                'parent_id' => 0,
                'name' => 'persetujuan-perpanjangan',
                'display_name' => 'Persetujuan Perpanjangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Permission::upsert($permissions, ['id'], ['parent_id', 'name', 'display_name']);
    }
}
