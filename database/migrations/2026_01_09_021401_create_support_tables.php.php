<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 4. Tabel Notifikasi (REQ USER)
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            // User penerima notifikasi
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            
            $table->string('judul', 100);
            $table->text('pesan');
            $table->string('link_target')->nullable(); // Link ke dokumen terkait
            $table->boolean('sudah_dibaca')->default(false);
            $table->string('tipe_notifikasi', 50)->default('info'); // info, warning, alert
            
            $table->timestamps();
        });

        // 5. Tabel Log Aktivitas (Audit Trail)
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->nullable()->constrained('users')->onDelete('set null');
            
            $table->string('tipe_aktivitas', 50); // LOGIN, UPLOAD, DOWNLOAD
            $table->text('keterangan'); // Detail aktivitas
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            
            $table->timestamp('waktu_dibuat')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
        Schema::dropIfExists('notifikasi');
    }
};