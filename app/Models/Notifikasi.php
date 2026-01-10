<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';

    protected $fillable = [
        'id_user',
        'judul',
        'pesan',
        'link_target',
        'sudah_dibaca',
        'tipe_notifikasi'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    // Scope helper untuk mengambil notifikasi yang belum dibaca
    public function scopeBelumDibaca($query)
    {
        return $query->where('sudah_dibaca', false);
    }
}