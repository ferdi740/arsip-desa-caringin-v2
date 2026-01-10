@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="min-h-screen bg-off-white py-4 sm:py-6">
    <div class="container mx-auto px-3 sm:px-4">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
                <div class="w-full">
                    <h1 class="text-2xl sm:text-3xl font-bold text-navy-blue mb-1">Edit Pengguna</h1>
                    <p class="text-sm sm:text-base text-steel-blue/80 font-medium">
                        Perbarui data akun <span class="font-semibold">{{ $user->username }}</span>
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <a href="{{ route('admin.users.index') }}" 
                       class="w-full md:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2.5 sm:py-3 bg-white text-navy-blue font-semibold rounded-xl shadow-sm border border-soft-gray hover:bg-off-white transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span class="text-sm sm:text-base">Kembali ke Daftar</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Success & Error Alerts -->
        @if(session('success'))
        <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-r-lg p-4 shadow-sm" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm sm:text-base text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        @if($errors->any())
        <div class="mb-6 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 rounded-r-lg p-4 shadow-sm" role="alert">
            <div class="flex flex-col">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm sm:text-base text-red-700 font-medium">Terjadi kesalahan!</p>
                </div>
                <ul class="list-disc list-inside ml-8 text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- User Info Card -->
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
                <!-- Card Header -->
                <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <h3 class="text-lg sm:text-xl font-semibold text-white">Edit Data Pengguna</h3>
                    </div>
                </div>

                <!-- User Current Info -->
                <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-soft-gray bg-off-white/50">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-navy-blue/10 flex items-center justify-center mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-base sm:text-lg font-semibold text-navy-blue truncate">{{ $user->nama_lengkap }}</p>
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3 mt-1">
                                <p class="text-xs sm:text-sm text-steel-blue">{{ $user->username }}</p>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                    {{ $user->role->nama_peran == 'Admin' ? 'bg-purple-100 text-purple-800' : 
                                       ($user->role->nama_peran == 'Operator' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $user->role->nama_peran }}
                                </span>
                                <span class="flex items-center text-xs font-medium {{ $user->status_aktif ? 'text-green-600' : 'text-red-600' }}">
                                    <div class="w-2 h-2 rounded-full {{ $user->status_aktif ? 'bg-green-500' : 'bg-red-500' }} mr-1"></div>
                                    {{ $user->status_aktif ? 'Aktif' : 'Non-Aktif' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-4 sm:p-6">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf @method('PUT')
                        
                        <!-- Nama Lengkap -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-navy-blue mb-2">
                                Nama Lengkap
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" 
                                   name="nama_lengkap" 
                                   value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                                   class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal placeholder-charcoal/40 focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200"
                                   placeholder="Masukkan nama lengkap pengguna"
                                   required>
                            <p class="text-xs text-steel-blue/60 mt-1">Nama lengkap sesuai dengan identitas resmi</p>
                        </div>

                        <!-- Username -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-navy-blue mb-2">
                                Username
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" 
                                   name="username" 
                                   value="{{ old('username', $user->username) }}"
                                   class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal placeholder-charcoal/40 focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200"
                                   placeholder="Username untuk login"
                                   required>
                            <p class="text-xs text-steel-blue/60 mt-1">Tidak dapat diubah setelah dibuat</p>
                        </div>

                        <!-- Password (Optional) -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-navy-blue mb-2">
                                Password Baru
                                <span class="text-steel-blue/60 font-normal text-xs ml-1">(Opsional)</span>
                            </label>
                            <div class="relative">
                                <input type="password" 
                                       name="password" 
                                       class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal placeholder-charcoal/40 focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200"
                                       placeholder="Isi hanya jika ingin mengganti password">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-steel-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-steel-blue/60 mt-1">Kosongkan jika tidak ingin mengubah password</p>
                        </div>

                        <!-- Role Selection -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-navy-blue mb-2">
                                Peran (Role)
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <select name="id_role" 
                                        class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal appearance-none focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200 cursor-pointer">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('id_role', $user->id_role) == $role->id ? 'selected' : '' }}>
                                            {{ $role->nama_peran }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-navy-blue">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-steel-blue/60 mt-1">Tentukan hak akses pengguna</p>
                        </div>

                        <!-- Unit Kerja Selection -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-navy-blue mb-2">
                                Unit Kerja
                                <span class="text-steel-blue/60 font-normal text-xs ml-1">(Opsional untuk Admin)</span>
                            </label>
                            <div class="relative">
                                <select name="id_unit_kerja" 
                                        class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal appearance-none focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200 cursor-pointer">
                                    <option value="">-- Tidak Ada --</option>
                                    @foreach($unitKerja as $unit)
                                        <option value="{{ $unit->id }}" {{ old('id_unit_kerja', $user->id_unit_kerja) == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-navy-blue">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-steel-blue/60 mt-1">Kosongkan jika role adalah Admin</p>
                        </div>

                        <!-- Status Aktif Toggle -->
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-navy-blue mb-3">Status Akun</label>
                            <div class="flex items-center p-4 rounded-xl border border-soft-gray bg-off-white/30 hover:bg-off-white/50 transition-colors duration-150 cursor-pointer"
                                 onclick="document.getElementById('statusToggle').click()">
                                <div class="relative inline-flex items-center cursor-pointer mr-3">
                                    <input type="checkbox" 
                                           name="status_aktif" 
                                           id="statusToggle"
                                           value="1"
                                           class="sr-only peer"
                                           {{ old('status_aktif', $user->status_aktif) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-navy-blue/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                                </div>
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-charcoal">Akun Aktif</span>
                                    <p class="text-xs text-steel-blue/60 mt-0.5">
                                        Nonaktifkan untuk menangguhkan akses pengguna ini
                                    </p>
                                </div>
                                <div class="ml-2 px-3 py-1 rounded-lg text-xs font-semibold {{ $user->status_aktif ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $user->status_aktif ? 'AKTIF' : 'NON-AKTIF' }}
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-soft-gray">
                            <a href="{{ route('admin.users.index') }}" 
                               class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white text-navy-blue font-semibold rounded-xl shadow-sm border border-soft-gray hover:bg-off-white transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-navy-blue/30">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Batalkan
                            </a>
                            <button type="submit" 
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-navy-blue text-white font-semibold rounded-xl shadow-lg hover:bg-steel-blue transition-all duration-200 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Perbarui Data Pengguna
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Form Footer -->
                <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-soft-gray bg-off-white">
                    <div class="text-xs text-steel-blue/60">
                        <span class="font-semibold text-navy-blue/80">Catatan:</span> Perubahan akan segera berlaku setelah disimpan.
                        @if(auth()->id() === $user->id)
                            <span class="block text-amber-600 font-medium mt-1">
                                ⚠ Anda sedang mengedit akun sendiri.
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Colors - Same as reference */
    :root {
        --navy-blue: #0A2540;
        --steel-blue: #334E68;
        --off-white: #F8F9FB;
        --white: #FFFFFF;
        --charcoal: #111827;
        --soft-gray: #E5E7EB;
    }

    .bg-navy-blue { 
        background-color: #0A2540 !important; 
    }
    .text-navy-blue { 
        color: #0A2540 !important; 
    }
    .bg-steel-blue { background-color: var(--steel-blue); }
    .text-steel-blue { color: var(--steel-blue); }
    .bg-off-white { background-color: var(--off-white); }
    .text-charcoal { color: var(--charcoal); }
    .border-soft-gray { border-color: var(--soft-gray); }
    .placeholder-charcoal\/40::placeholder { 
        color: rgba(17, 24, 39, 0.4); 
    }
    
    /* Toggle switch styling */
    .peer:checked ~ .peer-checked\:bg-green-500 {
        background-color: #10B981 !important;
    }
    
    /* Focus rings */
    .focus\:ring-navy-blue\/30:focus {
        --tw-ring-color: rgba(10, 37, 64, 0.3) !important;
    }
    
    .focus\:ring-navy-blue\/50:focus {
        --tw-ring-color: rgba(10, 37, 64, 0.5) !important;
    }
    
    .focus\:ring-navy-blue\/20:focus {
        --tw-ring-color: rgba(10, 37, 64, 0.2) !important;
    }
    
    /* Gradient */
    .bg-gradient-to-r {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
    }
</style>
@endsection