<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rat', function (Blueprint $table) {
            $table->id('id_RAT'); // Primary Key kustom
            // Foreign Key mengarah ke koperasi.id_koperasi
            $table->foreignId('id_koperasi')->constrained('koperasi', 'id_koperasi')->onDelete('cascade');
            $table->year('tahun_RAT');
            $table->date('tanggal_RAT');
            $table->string('tempat_RAT');
            $table->integer('jumlah_anggota');
            $table->text('hasil_RAT');
            $table->string('dokumen_RAT');
            $table->string('foto_kegiatan');
            $table->string('status_verifikasi')->default('belum diverifikasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rat');
    }
};