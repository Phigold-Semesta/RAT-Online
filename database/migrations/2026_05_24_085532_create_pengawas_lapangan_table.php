<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengawas_lapangan', function (Blueprint $table) {
            $table->id('id_pengawas'); // Primary Key kustom
            // Foreign Key mengarah ke user.id_user
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('cascade');
            $table->string('nama_pengawas');
            $table->string('wilayah_tugas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengawas_lapangan');
    }
};