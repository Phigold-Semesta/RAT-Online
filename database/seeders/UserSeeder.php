<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     */
    public function run(): void
    {
        // 1. Nonaktifkan pengecekan foreign key sementara waktu
        Schema::disableForeignKeyConstraints();

        // 2. Bersihkan data lama di tabel user
        DB::table('user')->truncate();

        // 3. Suntikkan data 4 aktor bawaan lengkap dengan kolom no_telp
        DB::table('user')->insert([
            // 1. AKUN ADMINISTRATOR (Internal Dinas)
            [
                'username'   => 'admindinas',
                'email'      => 'admindiskop@karawangkab.go.id',
                'password'   => Hash::make('password123'),
                'role'       => 'admin',
                'no_telp'    => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // 2. AKUN KOPERASI (Eksternal / Sampel Lembaga)
            [
                'username'   => 'koperasimaju',
                'email'      => 'koperasimajubersama@gmail.com',
                'password'   => Hash::make('password123'),
                'role'       => 'koperasi',
                'no_telp'    => '082134567891',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // 3. AKUN PENGAWAS LAPANGAN (Internal Dinas)
            [
                'username'   => 'edipengawas',
                'email'      => 'edipengawas@karawangkab.go.id',
                'password'   => Hash::make('password123'),
                'role'       => 'pengawas',
                'no_telp'    => '085734567892',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // 4. AKUN KEPALA DINAS (Kadis)
            [
                'username'   => 'kadisdiskop',
                'email'      => 'kadisdiskop@karawangkab.go.id',
                'password'   => Hash::make('password123'),
                'role'       => 'kadis',
                'no_telp'    => '089934567893',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 4. Aktifkan kembali pengecekan foreign key setelah proses seed selesai
        Schema::enableForeignKeyConstraints();
    }
}