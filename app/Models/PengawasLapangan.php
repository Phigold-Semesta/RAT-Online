<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengawasLapangan extends Model
{
    protected $table = 'pengawas_lapangan';
    protected $primaryKey = 'id_pengawas';

    protected $fillable = [
        'id_user',
        'wilayah_tugas',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi 1:* ke Verifikasi RAT (Pengawas melakukan banyak verifikasi)
    public function verifikasi_rat(): HasMany
    {
        return $this->hasMany(VerifikasiRat::class, 'id_pengawas', 'id_pengawas');
    }
}