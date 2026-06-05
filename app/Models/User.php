<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'email',
        'nama_lengkap',
        'jabatan',
        'password',
        'no_telp',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relasi 1:1 ke Profil Koperasi
    public function koperasi(): HasOne
    {
        return $this->hasOne(Koperasi::class, 'id_user', 'id_user');
    }

    // Relasi 1:1 ke Profil Pengawas Lapangan
    public function pengawas_lapangan(): HasOne
    {
        return $this->hasOne(PengawasLapangan::class, 'id_user', 'id_user');
    }

    // Relasi 1:* ke Laporan (Admin membuat/mengelola banyak laporan)
    public function laporan_admin(): HasMany
    {
        return $this->hasMany(Laporan::class, 'id_user', 'id_user');
    }

    // Relasi 1:* ke Laporan (Kepala Dinas mengesahkan banyak laporan)
    public function laporan_kadis(): HasMany
    {
        return $this->hasMany(Laporan::class, 'id_kadis', 'id_user');
    }
}