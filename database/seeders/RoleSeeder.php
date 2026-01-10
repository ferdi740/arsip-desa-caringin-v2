<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'nama_peran' => 'Admin',
                'deskripsi' => 'Administrator sistem dengan akses penuh (Koordinator)',
            ],
            [
                'nama_peran' => 'Operator',
                'deskripsi' => 'Kasi/Kaur yang mengelola dokumen unit kerja spesifik',
            ],
            [
                'nama_peran' => 'Viewer',
                'deskripsi' => 'Staf desa yang hanya melihat dan mengunduh dokumen',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}