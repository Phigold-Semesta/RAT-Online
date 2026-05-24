<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Koperasi extends Model
{
    protected $table = 'koperasi';
    protected $primaryKey = 'id_koperasi';

    protected $fillable = [
        'id_user',
        'nama_koperasi',
        'jenis_koperasi',
        'alamat',
        'kecamatan',
        'ketua_koperasi',
        'bendahara_koperasi',
        'sekertaris_koperasi',
        'jumlah_anggota',
        'tanggal_berdiri',
        'status_koperasi',
    ];

    // Membalikkan relasi ke tabel User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi 1:* ke data RAT (Satu koperasi punya banyak riwayat RAT)
    public function rat(): HasMany
    {
        return $this->hasMany(Rat::class, 'id_koperasi', 'id_koperasi');
    }
}