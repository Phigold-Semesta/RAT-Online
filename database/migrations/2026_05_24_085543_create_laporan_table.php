<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan'); // Primary Key kustom
            // Relasi Foreign Key murni
            $table->foreignId('id_RAT')->constrained('rat', 'id_RAT')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('cascade'); // Mengunci data admin pembuat rekap
            $table->foreignId('id_kadis')->constrained('kepala_dinas', 'id_kadis')->onDelete('cascade'); // Mengunci data pimpinan penerima laporan
            $table->string('jenis_laporan');
            $table->date('tanggal_laporan');
            $table->string('file_laporan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};