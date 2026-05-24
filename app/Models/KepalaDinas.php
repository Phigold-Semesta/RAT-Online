<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KepalaDinas extends Model
{
    protected $table = 'kepala_dinas';
    protected $primaryKey = 'id_kadis';

    protected $fillable = [
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi 1:* ke Laporan (Kadis meninjau banyak berkas laporan)
    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class, 'id_kadis', 'id_kadis');
    }
}