<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function baca($id)
    {
        $notif = Notifikasi::findOrFail($id);

        // Pastikan yg baca adalah pemilik notif
        if ($notif->id_user == Auth::id()) {
            $notif->update(['sudah_dibaca' => true]);
        }

        // Redirect ke link target (halaman detail dokumen)
        return redirect($notif->link_target);
    }
    public function tandaiSemuaDibaca()
    {
        // Update semua notifikasi milik user yang login menjadi sudah_dibaca = true
        Notifikasi::where('id_user', Auth::id())
                  ->where('sudah_dibaca', false)
                  ->update(['sudah_dibaca' => true]);

        // Kembali ke halaman sebelumnya
        return back();
    }
}