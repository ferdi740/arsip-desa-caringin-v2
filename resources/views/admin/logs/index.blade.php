@extends('layouts.app')

@section('title', 'Audit Trail Sistem')

@section('content')
<div class="min-h-screen bg-off-white py-4 sm:py-6">
    <div class="container mx-auto px-3 sm:px-4">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
                <div class="w-full">
                    <h1 class="text-2xl sm:text-3xl font-bold text-navy-blue mb-1">Audit Trail Sistem</h1>
                    <p class="text-sm sm:text-base text-steel-blue/80 font-medium">Memantau seluruh aktivitas pengguna untuk keamanan dan transparansi</p>
                </div>
                
                <div class="text-sm text-navy-blue font-medium self-start sm:self-center">
                    {{ $logs->total() }} aktivitas tercatat
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

        <!-- Filter Card -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden mb-6">
            <!-- Card Header -->
            <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                <div class="flex items-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    <h3 class="text-lg sm:text-xl font-semibold text-white">Filter Aktivitas</h3>
                </div>
            </div>

            <!-- Filter Form -->
            <div class="p-4 sm:p-6">
                <form action="{{ route('admin.logs.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-navy-blue mb-2">Cari Aktivitas</label>
                        <div class="relative">
                            <input type="text" 
                                   name="cari" 
                                   value="{{ request('cari') }}" 
                                   placeholder="Cari nama pengguna atau keterangan aktivitas..." 
                                   class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal placeholder-charcoal/40 focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-steel-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Type Filter -->
                    <div class="w-full md:w-48">
                        <label class="block text-sm font-semibold text-navy-blue mb-2">Tipe Aktivitas</label>
                        <div class="relative">
                            <select name="tipe" 
                                    class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal appearance-none focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200 cursor-pointer">
                                <option value="">Semua Tipe</option>
                                <option value="UPLOAD" {{ request('tipe') == 'UPLOAD' ? 'selected' : '' }}>UPLOAD</option>
                                <option value="UPDATE" {{ request('tipe') == 'UPDATE' ? 'selected' : '' }}>UPDATE</option>
                                <option value="DELETE" {{ request('tipe') == 'DELETE' ? 'selected' : '' }}>DELETE</option>
                                <option value="DOWNLOAD" {{ request('tipe') == 'DOWNLOAD' ? 'selected' : '' }}>DOWNLOAD</option>
                                <option value="PREVIEW" {{ request('tipe') == 'PREVIEW' ? 'selected' : '' }}>PREVIEW</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-navy-blue">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-end gap-2">
                        <button type="submit" 
                                class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 bg-navy-blue text-white font-semibold rounded-xl shadow-lg hover:bg-steel-blue transition-all duration-200 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Terapkan Filter
                        </button>
                        
                        @if(request()->has('cari') || request()->has('tipe'))
                        <a href="{{ route('admin.logs.index') }}" 
                           class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 bg-white text-navy-blue font-semibold rounded-xl shadow-sm border border-soft-gray hover:bg-off-white transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-navy-blue/30">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Reset
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Logs Table Card -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
            <!-- Card Header -->
            <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-0">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="text-base sm:text-lg font-semibold text-white">Riwayat Aktivitas Sistem</h3>
                    </div>
                    <div class="text-xs sm:text-sm text-white/90 font-medium">
                        Total: {{ $logs->total() }} aktivitas
                    </div>
                </div>
            </div>

            <!-- Mobile View (Cards) -->
            <div class="sm:hidden">
                <div class="divide-y divide-soft-gray/50">
                    @forelse($logs as $log)
                    <div class="p-4 hover:bg-off-white/30 transition-colors duration-150">
                        <!-- Activity Header -->
                        <div class="flex items-start mb-3">
                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-navy-blue/10 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-navy-blue mb-0.5">{{ $log->user->nama_lengkap ?? 'User Terhapus' }}</p>
                                <p class="text-xs text-steel-blue">{{ $log->user->role->nama_peran ?? '-' }}</p>
                            </div>
                            <div>
                                @php
                                    $color = match($log->tipe_aktivitas) {
                                        'DELETE' => ['bg' => 'bg-red-100', 'text' => 'text-red-800'],
                                        'UPLOAD' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800'],
                                        'UPDATE' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800'],
                                        'DOWNLOAD' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800'],
                                        'PREVIEW' => ['bg' => 'bg-teal-100', 'text' => 'text-teal-800'],
                                        default => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800'],
                                    };
                                @endphp
                                <span class="px-2 py-0.5 text-xs rounded-full font-semibold {{ $color['bg'] }} {{ $color['text'] }}">
                                    {{ $log->tipe_aktivitas }}
                                </span>
                            </div>
                        </div>

                        <!-- Activity Details -->
                        <div class="mb-3 pl-13">
                            <p class="text-sm text-charcoal mb-2">{{ $log->keterangan }}</p>
                            <div class="flex flex-wrap items-center gap-3 text-xs text-steel-blue/80">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($log->waktu_dibuat)->format('d M Y, H:i') }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3"/>
                                    </svg>
                                    {{ $log->ip_address }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center">
                        <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-off-white flex items-center justify-center">
                            <svg class="w-7 h-7 text-charcoal/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <p class="text-base font-medium text-charcoal/60 mb-1">Belum ada aktivitas</p>
                        <p class="text-sm text-charcoal/40">Semua aktivitas akan dicatat di sini</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Desktop View (Table) -->
            <div class="hidden sm:block">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-off-white">
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">Waktu</th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">Pengguna</th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">Tipe</th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">Aktivitas</th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">IP Address</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-soft-gray">
                            @forelse($logs as $log)
                            <tr class="hover:bg-off-white/50 transition-colors duration-150">
                                <!-- Waktu -->
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-navy-blue/10 flex items-center justify-center mr-2 sm:mr-3">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-navy-blue">
                                                {{ \Carbon\Carbon::parse($log->waktu_dibuat)->format('d M Y') }}
                                            </p>
                                            <p class="text-xs text-steel-blue">
                                                {{ \Carbon\Carbon::parse($log->waktu_dibuat)->format('H:i:s') }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <!-- User -->
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-navy-blue">{{ $log->user->nama_lengkap ?? 'User Terhapus' }}</p>
                                            <p class="text-xs text-steel-blue truncate">{{ $log->user->role->nama_peran ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Tipe Aktivitas -->
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    @php
                                        $color = match($log->tipe_aktivitas) {
                                            'DELETE' => ['bg' => 'bg-red-100', 'text' => 'text-red-800'],
                                            'UPLOAD' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800'],
                                            'UPDATE' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800'],
                                            'DOWNLOAD' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800'],
                                            'PREVIEW' => ['bg' => 'bg-teal-100', 'text' => 'text-teal-800'],
                                            default => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800'],
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2 sm:px-3 py-0.5 sm:py-1 rounded-full text-xs font-medium {{ $color['bg'] }} {{ $color['text'] }}">
                                        {{ $log->tipe_aktivitas }}
                                    </span>
                                </td>

                                <!-- Aktivitas Detail -->
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <p class="text-sm text-charcoal mb-1">{{ $log->keterangan }}</p>
                                </td>

                                <!-- IP Address -->
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center text-sm text-steel-blue font-mono">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2 text-steel-blue/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3"/>
                                        </svg>
                                        {{ $log->ip_address }}
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 rounded-full bg-off-white flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-charcoal/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <p class="text-lg font-medium text-charcoal/60 mb-1">Belum ada aktivitas</p>
                                        <p class="text-sm text-charcoal/40">Semua aktivitas akan dicatat di sini</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table Footer -->
            @if($logs->count() > 0)
            <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-soft-gray bg-off-white">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-0">
                    <div class="text-xs text-steel-blue/60">
                        * Log aktivitas dicatat secara otomatis oleh sistem
                    </div>
                    <div class="text-xs text-navy-blue/80 font-medium">
                        {{ $logs->withQueryString()->links() }}
                    </div>
                </div>
            </div>
            @endif
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
    
    /* Focus rings */
    .focus\:ring-navy-blue\/30:focus {
        --tw-ring-color: rgba(10, 37, 64, 0.3) !important;
    }
    
    .focus\:ring-navy-blue\/50:focus {
        --tw-ring-color: rgba(10, 37, 64, 0.5) !important;
    }
    
    /* Gradient */
    .bg-gradient-to-r {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
    }
    
    /* Mobile optimization */
    @media (max-width: 640px) {
        .pl-13 {
            padding-left: 3.25rem;
        }
    }
</style>
@endsection