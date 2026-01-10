<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumen';

    protected $fillable = [
        'id_kategori',
        'id_unit_kerja',
        'id_pengunggah',
        'nomor_dokumen',
        'judul_dokumen',
        'deskripsi',
        'tahun_dokumen',
        'lokasi_file',
        'tipe_file',
        'ukuran_file',
        'status_retensi',
        'tanggal_unggah'
    ];

    protected $casts = [
        'tanggal_unggah' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja');
    }

    public function pengunggah()
    {
        return $this->belongsTo(User::class, 'id_pengunggah');
    }
}