<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id_role',
        'id_unit_kerja',
        'nama_lengkap',
        'username',
        'email',
        'password',
        'status_aktif'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];

    // Relasi
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function unitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'id_unit_kerja');
    }
    
    // Cek Role Helper
    public function isAdmin() {
        return $this->role->nama_peran === 'Admin';
    }
}