<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Surat Keputusan (SK)', 'masa_retensi' => 5],
            ['nama_kategori' => 'Peraturan Desa (Perdes)', 'masa_retensi' => 10],
            ['nama_kategori' => 'Surat Masuk Eksternal', 'masa_retensi' => 5],
            ['nama_kategori' => 'Surat Keluar', 'masa_retensi' => 5],
            ['nama_kategori' => 'Laporan Keuangan', 'masa_retensi' => 10],
            ['nama_kategori' => 'Dokumen Pertanahan', 'masa_retensi' => 20], // Arsip vital
            ['nama_kategori' => 'Berita Acara', 'masa_retensi' => 5],
        ];

        foreach ($kategori as $k) {
            Kategori::create($k);
        }
    }
}