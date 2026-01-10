<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitKerja;

class UnitKerjaSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            ['nama_unit' => 'Sekretariat Desa', 'kode_unit' => 'SEKDES'],
            ['nama_unit' => 'Kaur Keuangan', 'kode_unit' => 'KEU'],
            ['nama_unit' => 'Kaur Umum & Tata Usaha', 'kode_unit' => 'UMUM'],
            ['nama_unit' => 'Kaur Perencanaan', 'kode_unit' => 'REN'],
            ['nama_unit' => 'Kasi Pemerintahan', 'kode_unit' => 'PEM'],
            ['nama_unit' => 'Kasi Kesejahteraan', 'kode_unit' => 'KESRA'],
            ['nama_unit' => 'Kasi Pelayanan', 'kode_unit' => 'PEL'],
        ];

        foreach ($units as $unit) {
            UnitKerja::create($unit);
        }
    }
}