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
        'id_user',
        'id_kadis',
        'jenis_laporan',
        'tanggal_laporan',
        'file_laporan',
        'status_laporan',
        'catatan_revisi',
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

    // Relasi balik ke Kepala Dinas (Langsung ke induk User)
    public function kepala_dinas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_kadis', 'id_user');
    }
}