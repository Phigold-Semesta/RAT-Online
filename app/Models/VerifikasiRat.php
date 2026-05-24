<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VerifikasiRat extends Model
{
    protected $table = 'verifikasi_rat';
    protected $primaryKey = 'id_verifikasi';

    protected $fillable = [
        'id_RAT',
        'id_pengawas',
        'tanggal_verifikasi',
        'status_validasi',
        'rekomendasi',
    ];

    public function rat(): BelongsTo
    {
        return $this->belongsTo(Rat::class, 'id_RAT', 'id_RAT');
    }

    public function pengawas_lapangan(): BelongsTo
    {
        return $this->belongsTo(PengawasLapangan::class, 'id_pengawas', 'id_pengawas');
    }
}