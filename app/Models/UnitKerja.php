<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    // Nama tabel sesuai migrasi
    protected $table = 'unit_kerja';

    protected $fillable = [
        'nama_unit', // Contoh: Kasi Pemerintahan
        'kode_unit'  // Contoh: PEM
    ];

    // Relasi: Satu Unit Kerja memiliki banyak User (Staf)
    public function users()
    {
        return $this->hasMany(User::class, 'id_unit_kerja');
    }

    // Relasi: Satu Unit Kerja memiliki banyak Dokumen
    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_unit_kerja');
    }
}