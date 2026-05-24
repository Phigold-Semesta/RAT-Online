<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_RAT',
        'id_user', // Mencatat Admin pembuat rekap
        'id_kadis', // Mencatat Kadis peninjau laporan
        'jenis_laporan',
        'tanggal_laporan',
        'file_laporan',
    ];

    public function rat(): BelongsTo
    {
        return $this->belongsTo(Rat::class, 'id_RAT', 'id_RAT');
    }

    // Relasi balik ke Admin (User)
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi balik ke Kepala Dinas
    public function kepala_dinas(): BelongsTo
    {
        return $this->belongsTo(KepalaDinas::class, 'id_kadis', 'id_kadis');
    }
}