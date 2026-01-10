<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Role
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peran', 50); // Admin, Operator, Viewer
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 2. Tabel Unit Kerja
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit', 100); // Misal: Kasi Pemerintahan
            $table->string('kode_unit', 20)->unique(); // Misal: PEM
            $table->timestamps();
        });

        // 3. Tabel Kategori Dokumen
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 100);
            $table->integer('masa_retensi')->default(5); // Dalam tahun
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('unit_kerja');
        Schema::dropIfExists('role');
    }
};