<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verifikasi_rat', function (Blueprint $table) {
            $table->id('id_verifikasi'); // Primary Key kustom
            // Foreign Key terhubung ke data RAT dan Pengawas Lapangan
            $table->foreignId('id_RAT')->constrained('rat', 'id_RAT')->onDelete('cascade');
            $table->foreignId('id_pengawas')->constrained('pengawas_lapangan', 'id_pengawas')->onDelete('cascade');
            $table->date('tanggal_verifikasi');
            $table->string('status_validasi');
            $table->text('rekomendasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verifikasi_rat');
    }
};