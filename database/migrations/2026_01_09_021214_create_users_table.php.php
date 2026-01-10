<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Foreign Key ke Role
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('role')->onDelete('cascade');
            
            // Foreign Key ke Unit Kerja (Boleh NULL untuk Admin)
            $table->unsignedBigInteger('id_unit_kerja')->nullable();
            $table->foreign('id_unit_kerja')->references('id')->on('unit_kerja')->onDelete('set null');

            $table->string('nama_lengkap');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable(); // Opsional untuk reset password
            $table->string('password');
            $table->boolean('status_aktif')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};