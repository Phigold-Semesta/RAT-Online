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
    protected $primaryKey = 'id_user'; // Kustom ID sesuai instruksi Anda

    protected $fillable = [
        'username',
        'password',
        'email',
        'no_telp',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
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

    // Relasi 1:1 ke Profil Kepala Dinas
    public function kepala_dinas(): HasOne
    {
        return $this->hasOne(KepalaDinas::class, 'id_user', 'id_user');
    }

    // Relasi 1:* ke Laporan (Admin membuat banyak laporan)
    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class, 'id_user', 'id_user');
    }
}