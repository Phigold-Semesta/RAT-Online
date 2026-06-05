<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KepalaDinas extends Model
{
    // 1. Mendefinisikan nama tabel yang sesuai di database phpMyAdmin
    protected $table = 'kepala_dinas';

    // 2. Menentukan Primary Key kustom sesuai cetakan skema database Anda
    protected $primaryKey = 'id_kadis';

    // 3. Kolom yang diizinkan untuk diisi secara massal (Mass Assignment)
    protected $fillable = [
        'id_user',
    ];

    /**
     * Relasi balik ke model induk User (BelongsTo)
     * Menghubungkan entitas profil Kepala Dinas ke akun otentikasi utamanya.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    /**
     * Relasi 1:* ke Laporan (HasMany)
     * Logika: 1 Kepala Dinas dapat meninjau dan mengesahkan banyak berkas laporan.
     * * - Parameter ke-2: 'id_kadis' adalah Foreign Key di dalam tabel 'laporan'.
     * - Parameter ke-3: 'id_kadis' adalah Local Key / Primary Key di tabel 'kepala_dinas'.
     */
    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class, 'id_kadis', 'id_kadis');
    }
}