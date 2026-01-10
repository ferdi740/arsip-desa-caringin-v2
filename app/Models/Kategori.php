<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel sesuai migrasi
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori', // Contoh: Surat Keputusan, Perdes
        'masa_retensi'   // Dalam tahun (integer)
    ];

    // Relasi: Satu Kategori memiliki banyak Dokumen
    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_kategori');
    }
}