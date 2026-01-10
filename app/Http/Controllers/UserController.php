<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <-- PERBAIKAN 1: Tambahkan ini

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['role', 'unitKerja'])->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $unitKerja = UnitKerja::all();
        return view('admin.users.create', compact('roles', 'unitKerja'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:150',
            'username'     => 'required|string|max:50|unique:users,username',
            'email'        => 'nullable|email|unique:users,email',
            'password'     => 'required|string|min:6',
            'id_role'      => 'required|exists:role,id',
            'id_unit_kerja'=> 'nullable|exists:unit_kerja,id',
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'id_role'      => $request->id_role,
            'id_unit_kerja'=> $request->id_unit_kerja, // Bisa null jika Admin
            'status_aktif' => 1
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $unitKerja = UnitKerja::all();
        return view('admin.users.edit', compact('user', 'roles', 'unitKerja'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:150',
            'username'     => 'required|string|max:50|unique:users,username,'.$id,
            'id_role'      => 'required|exists:role,id',
            'password'     => 'nullable|string|min:6', // Password opsional saat edit
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'email'        => $request->email,
            'id_role'      => $request->id_role,
            'id_unit_kerja'=> $request->id_unit_kerja,
            'status_aktif' => $request->has('status_aktif') ? 1 : 0
        ];

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // PERBAIKAN 2: Menggunakan Facade Auth::id() agar dikenali editor
        if (Auth::id() == $id) {
            return back()->withErrors(['Tidak bisa menghapus akun sendiri!']);
        }

        $user->delete();
        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}