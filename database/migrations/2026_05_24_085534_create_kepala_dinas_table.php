<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kepala_dinas', function (Blueprint $table) {
            $table->id('id_kadis'); // Primary Key kustom
            // Foreign Key mengarah ke user.id_user
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kepala_dinas');
    }
};