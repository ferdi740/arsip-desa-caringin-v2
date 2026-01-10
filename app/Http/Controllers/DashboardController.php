<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Statistik Dasar (Card)
        // Hitung total dokumen
        $totalDokumen = Dokumen::count();
        
        // Hitung dokumen bulan ini
        $dokumenBulanIni = Dokumen::whereMonth('tanggal_unggah', date('m'))
                            ->whereYear('tanggal_unggah', date('Y'))
                            ->count();

        // Hitung total kategori
        $totalKategori = Kategori::count();

        // Hitung total user (Hanya untuk Admin)
        $totalUser = User::count();

        // 2. Data Grafik Per Kategori (Untuk Chart)
        // Mengelompokkan dokumen berdasarkan nama kategori dan menghitung jumlahnya
        $statistikKategori = Dokumen::select('kategori.nama_kategori', DB::raw('count(dokumen.id) as total'))
                            ->join('kategori', 'dokumen.id_kategori', '=', 'kategori.id')
                            ->groupBy('kategori.nama_kategori')
                            ->get();

        // 3. Dokumen Terbaru (5 data terakhir)
        $dokumenTerbaru = Dokumen::with(['kategori', 'pengunggah'])
                            ->latest('tanggal_unggah')
                            ->take(5)
                            ->get();

        return view('dashboard', compact(
            'totalDokumen', 
            'dokumenBulanIni', 
            'totalKategori', 
            'totalUser',
            'statistikKategori',
            'dokumenTerbaru'
        ));
    }
}