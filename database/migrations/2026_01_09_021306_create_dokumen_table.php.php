<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            
            // Relasi
            $table->foreignId('id_kategori')->constrained('kategori')->onDelete('cascade');
            $table->foreignId('id_unit_kerja')->constrained('unit_kerja')->onDelete('cascade');
            $table->foreignId('id_pengunggah')->constrained('users')->onDelete('cascade');

            // Metadata Dokumen
            $table->string('nomor_dokumen', 100);
            $table->string('judul_dokumen', 255);
            $table->text('deskripsi')->nullable();
            $table->year('tahun_dokumen');
            
            // File Info
            $table->string('lokasi_file', 255); // Path di storage
            $table->string('tipe_file', 10); // pdf, docx
            $table->integer('ukuran_file'); // dalam KB

            // Status Retensi (Aktif, Inaktif, Musnah)
            $table->enum('status_retensi', ['Aktif', 'Inaktif', 'Musnah'])->default('Aktif');
            
            $table->timestamp('tanggal_unggah')->useCurrent();
            $table->timestamps();
            
            // Indexing untuk pencarian cepat
            $table->index('judul_dokumen');
            $table->index('nomor_dokumen');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};