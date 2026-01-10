<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UnitKerja;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin (Super User)
        // Admin tidak wajib punya unit kerja (null)
        User::create([
            'id_role' => Role::where('nama_peran', 'Admin')->first()->id,
            'id_unit_kerja' => null, 
            'nama_lengkap' => 'Administrator Sistem',
            'username' => 'admin',
            'email' => 'admin@desa.id',
            'password' => Hash::make('password123'), // Password default
            'status_aktif' => true,
        ]);

        // 2. Buat Akun Operator (Contoh: Kaur Keuangan)
        $unitKeuangan = UnitKerja::where('kode_unit', 'KEU')->first();
        User::create([
            'id_role' => Role::where('nama_peran', 'Operator')->first()->id,
            'id_unit_kerja' => $unitKeuangan->id,
            'nama_lengkap' => 'Budi Santoso (Kaur Keuangan)',
            'username' => 'kaur_keuangan',
            'email' => 'keuangan@desa.id',
            'password' => Hash::make('password123'),
            'status_aktif' => true,
        ]);

        // 3. Buat Akun Viewer (Contoh: Staf Umum)
        $unitUmum = UnitKerja::where('kode_unit', 'UMUM')->first();
        User::create([
            'id_role' => Role::where('nama_peran', 'Viewer')->first()->id,
            'id_unit_kerja' => $unitUmum->id,
            'nama_lengkap' => 'Siti Aminah (Staf)',
            'username' => 'staf_umum',
            'email' => 'staf@desa.id',
            'password' => Hash::make('password123'),
            'status_aktif' => true,
        ]);
    }
}