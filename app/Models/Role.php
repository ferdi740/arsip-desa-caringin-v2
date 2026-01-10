<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit karena nama tabel kita 'role' (singular), 
    // bukan 'roles' (plural default Laravel)
    protected $table = 'role';

    protected $fillable = [
        'nama_peran',
        'deskripsi'
    ];

    // Relasi: Satu Role memiliki banyak User
    public function users()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}