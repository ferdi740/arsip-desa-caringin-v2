<?php

namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    /**
     * Menampilkan daftar log aktivitas
     */
    public function index(Request $request)
    {
        $query = LogAktivitas::with('user');

        // Filter Pencarian (User atau Keterangan)
        if ($request->filled('cari')) {
            $query->where('keterangan', 'like', '%' . $request->cari . '%')
                  ->orWhereHas('user', function($q) use ($request) {
                      $q->where('nama_lengkap', 'like', '%' . $request->cari . '%');
                  });
        }

        // Filter Tipe Aktivitas
        if ($request->filled('tipe')) {
            $query->where('tipe_aktivitas', $request->tipe);
        }

        // Urutkan dari yang terbaru
        $logs = $query->latest('waktu_dibuat')->paginate(20);

        return view('admin.logs.index', compact('logs'));
    }
}