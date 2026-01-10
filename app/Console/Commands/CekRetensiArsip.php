<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Notifikasi;
use Carbon\Carbon;

class CekRetensiArsip extends Command
{
    /**
     * Nama perintah terminal
     */
    protected $signature = 'arsip:cek-retensi';

    /**
     * Deskripsi perintah
     */
    protected $description = 'Mengecek dokumen yang sudah melewati masa retensi dan menandainya sebagai Inaktif';

    /**
     * Eksekusi perintah
     */
    public function handle()
    {
        $this->info('Memulai pengecekan retensi arsip...');

        $kategoriList = Kategori::all();
        $jumlahTerupdate = 0;

        foreach ($kategoriList as $kategori) {
            // Hitung tahun batas (Contoh: Skrg 2026, Retensi 5 thn -> Batas 2021)
            // Dokumen tahun 2020 harus jadi Inaktif
            $tahunBatas = Carbon::now()->year - $kategori->masa_retensi;

            $dokumenKadaluarsa = Dokumen::where('id_kategori', $kategori->id)
                                        ->where('status_retensi', 'Aktif') // Hanya yg masih aktif
                                        ->where('tahun_dokumen', '<=', $tahunBatas)
                                        ->get();

            foreach ($dokumenKadaluarsa as $dok) {
                // Update Status
                $dok->update(['status_retensi' => 'Inaktif']);
                $jumlahTerupdate++;
                
                $this->info("Dokumen '$dok->judul_dokumen' diubah menjadi Inaktif.");
            }
        }

        // Jika ada perubahan, beri notifikasi ke Admin
        if ($jumlahTerupdate > 0) {
            $admins = User::whereHas('role', function($q) { $q->where('nama_peran', 'Admin'); })->get();
            foreach ($admins as $admin) {
                Notifikasi::create([
                    'id_user' => $admin->id,
                    'judul'   => 'Retensi Arsip Otomatis',
                    'pesan'   => "$jumlahTerupdate dokumen telah memasuki masa Inaktif.",
                    'link_target' => route('dokumen.index', ['status_retensi' => 'Inaktif'], false),
                    'tipe_notifikasi' => 'warning'
                ]);
            }
        }

        $this->info("Selesai. Total $jumlahTerupdate dokumen diperbarui.");
    }
}