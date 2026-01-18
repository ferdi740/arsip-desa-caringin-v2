<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLoginForm()
    {
        // Jika user sudah login, langsung alihkan ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Proses Login
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // 2. Coba Login (Auth::attempt otomatis hash password input & cocokan dgn DB)
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Jika sukses:
            $request->session()->regenerate(); // Mencegah Session Fixation
            
            // Cek status aktif user
            if (Auth::user()->status_aktif == 0) {
                Auth::logout();
                return back()->withErrors(['username' => 'Akun Anda dinonaktifkan. Hubungi Admin.']);
            }

            // Redirect ke Dashboard
            return redirect()->intended('dashboard');
        }

        // Jika gagal:
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    /**
     * Proses Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // [PERUBAHAN DISINI]
        // Arahkan ke route 'landing' (halaman utama), bukan 'login'
        return redirect()->route('landing'); 
    }
}