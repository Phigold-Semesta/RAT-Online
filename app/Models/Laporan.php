<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    // Menegaskan nama tabel agar Laravel tidak mencari 'laporans'
    protected $table = 'laporan';

    // Menegaskan primary key sesuai dengan database Anda
    protected $primaryKey = 'id_laporan';

    // Mengaktifkan timestamps karena tabel Anda memiliki created_at dan updated_at
    public $timestamps = true;

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

    /**
     * Relasi ke RAT
     */
    public function rat(): BelongsTo
    {
        return $this->belongsTo(Rat::class, 'id_RAT', 'id_RAT');
    }

    /**
     * Relasi ke User (Admin/Pembuat Laporan)
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    /**
     * Relasi ke Kepala Dinas (User)
     */
    public function kepala_dinas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_kadis', 'id_user');
    }
}