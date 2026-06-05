<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rat extends Model
{
    protected $table = 'rat';
    protected $primaryKey = 'id_RAT';

    protected $fillable = [
        'id_koperasi',
        'tahun_buku',
        'tahun_RAT',
        'tanggal_RAT',
        'tempat_RAT',
        'jumlah_anggota',
        'hasil_RAT',
        'dokumen_RAT',
        'foto_kegiatan',
        'status_verifikasi',
    ];

    public function koperasi(): BelongsTo
    {
        return $this->belongsTo(Koperasi::class, 'id_koperasi', 'id_koperasi');
    }

    // Relasi 1:* ke transaksi verifikasi lapangan
    public function verifikasi_rat(): HasMany
    {
        return $this->hasMany(VerifikasiRat::class, 'id_RAT', 'id_RAT');
    }

    // Relasi 1:1 ke Laporan Akhir
    public function laporan(): HasOne
    {
        return $this->hasOne(Laporan::class, 'id_RAT', 'id_RAT');
    }
}