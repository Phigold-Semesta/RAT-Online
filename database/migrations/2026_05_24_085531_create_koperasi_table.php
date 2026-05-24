<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('koperasi', function (Blueprint $table) {
            $table->id('id_koperasi'); // Primary Key kustom
            // Foreign Key mengarah ke user.id_user
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('cascade');
            $table->string('nama_koperasi');
            $table->string('jenis_koperasi');
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('ketua_koperasi');
            $table->string('bendahara_koperasi');
            $table->string('sekertaris_koperasi'); // Sesuai ejaan ERD Anda
            $table->integer('jumlah_anggota');
            $table->date('tanggal_berdiri');
            $table->string('status_koperasi')->default('pending'); // Menunggu aktivasi admin
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('koperasi');
    }
};