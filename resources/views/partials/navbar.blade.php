<header class="sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-white border-b border-soft-gray shadow-sm">
    
    <!-- Left Section: Menu Toggle & Brand -->
    <div class="flex items-center space-x-4">
        <!-- Mobile Menu Toggle -->
        <button @click="sidebarOpen = true" 
                class="lg:hidden p-2.5 rounded-lg text-charcoal/70 hover:text-navy-blue hover:bg-off-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-soft-gold/30">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h11"/>
            </svg>
        </button>
        
        <!-- Brand -->
        <div class="flex items-center">
            <div class="hidden sm:flex items-center space-x-3">
                <div class="flex flex-col">
                    <h1 class="text-xl font-bold text-navy-blue leading-tight tracking-tight">Sistem Arsip Desa Caringin</h1>
                </div>
            </div>
            
            <!-- Mobile Brand -->
            <div class="sm:hidden flex items-center space-x-2">
                <div class="w-8 h-8 rounded-lg bg-linear-to-br from-navy-blue to-steel-blue flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5 text-soft-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <span class="text-lg font-bold text-navy-blue tracking-tight">SIP-DESA</span>
            </div>
        </div>
    </div>
    
    <!-- Right Section: Actions & User -->
    <div class="flex items-center space-x-4">
        <!-- Notifications -->
        <div class="relative" x-data="{ notifOpen: false }">
            <button @click="notifOpen = !notifOpen" 
                    class="relative p-2.5 rounded-lg transition-all duration-200 hover:bg-off-white group focus:outline-none focus:ring-2 focus:ring-soft-gold/30">
                <div class="relative">
                    <svg class="w-6 h-6 text-charcoal/60 group-hover:text-navy-blue transition-colors duration-200" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" 
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    
                    @if($notifCount > 0)
                    <span class="absolute -top-1.5 -right-1.5 inline-flex items-center justify-center min-w-[20px] h-5 px-1.5 text-xs font-bold text-white bg-linear-to-r from-red-500 to-red-600 rounded-full border-2 border-white shadow-sm">
                        {{ $notifCount > 9 ? '9+' : $notifCount }}
                    </span>
                    @endif
                </div>
            </button>

            <!-- Notifications Dropdown -->
            <div x-show="notifOpen" 
                 @click.away="notifOpen = false" 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-80 md:w-96 bg-white rounded-xl shadow-lg overflow-hidden z-50 border border-soft-gray"
                 style="display: none;">
                
                <!-- Dropdown Header -->
                <div class="px-4 py-3 bg-linear-to-r from-navy-blue to-steel-blue">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="text-sm font-semibold text-white">Notifikasi</span>
                        </div>
                        @if($notifCount > 0)
                        <a href="{{ route('notifikasi.bacaSemua') }}" 
                           class="text-xs font-medium text-soft-gold hover:text-white/90 transition-colors duration-150">
                            Tandai Baca Semua
                        </a>
                        @endif
                    </div>
                </div>
                
                <!-- Notifications List -->
                <div class="max-h-80 overflow-y-auto">
                    @forelse($notifList as $notif)
                        @php
                            // Tentukan link berdasarkan data notifikasi
                            // Model Anda menggunakan link_target, bukan id_dokumen
                            $link = $notif->link_target ?? '#';
                            
                            // Jika tidak ada link_target, coba buat dari id_dokumen (jika ada)
                            if ($link === '#' && isset($notif->id_dokumen) && $notif->id_dokumen) {
                                $link = route('dokumen.show', $notif->id_dokumen);
                            }
                        @endphp
                        
                        <a href="{{ $link }}" 
                           onclick="if(event) { event.preventDefault(); } markNotificationAsRead({{ $notif->id }}, '{{ addslashes($link) }}');"
                           class="block px-4 py-3 border-b border-soft-gray hover:bg-off-white transition-colors duration-150 group cursor-pointer">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 mt-0.5">
                                    <div class="w-2 h-2 rounded-full {{ $notif->sudah_dibaca ? 'bg-gray-300' : 'bg-blue-500 animate-pulse' }}"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-charcoal group-hover:text-navy-blue truncate">
                                        {{ $notif->judul ?? 'Notifikasi Sistem' }}
                                    </p>
                                    <p class="text-xs text-charcoal/60 mt-1 line-clamp-2">
                                        {{ $notif->pesan ?? 'Tidak ada pesan' }}
                                    </p>
                                    <div class="flex items-center justify-between mt-2">
                                        <span class="inline-flex items-center text-[10px] font-medium {{ $notif->sudah_dibaca ? 'text-gray-400' : 'text-blue-500' }}">
                                            {{ \Carbon\Carbon::parse($notif->created_at ?? now())->diffForHumans() }}
                                        </span>
                                        @if(!$notif->sudah_dibaca)
                                            <span class="text-[10px] font-medium px-2 py-0.5 bg-blue-50 text-blue-700 rounded-full">
                                                Baru
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="px-4 py-8 text-center">
                            <div class="w-14 h-14 mx-auto mb-3 flex items-center justify-center rounded-full bg-off-white">
                                <svg class="w-7 h-7 text-charcoal/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                </svg>
                            </div>
                            <p class="text-sm text-charcoal/60 font-medium">Tidak ada notifikasi</p>
                            <p class="text-xs text-charcoal/40 mt-1">Semua notifikasi telah dibaca</p>
                        </div>
                    @endforelse
                </div>
                
                <!-- Dropdown Footer -->
                @if($notifList->count() > 0)
                <div class="px-4 py-3 bg-off-white border-t border-soft-gray">
                    <div class="text-center">
                        <p class="text-sm font-medium text-navy-blue">
                            {{ $notifList->count() }} notifikasi tersedia
                        </p>
                        @if($notifList->count() > 5)
                        <a href="{{ route('dashboard') }}" 
                           class="text-xs text-steel-blue hover:text-navy-blue transition-colors mt-1 inline-block">
                            Lihat lebih banyak
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Separator -->
        <div class="h-8 w-px bg-soft-gray mx-1 hidden md:block"></div>

        <!-- User Profile -->
        <div class="flex items-center space-x-3 pl-1">
            <div class="hidden md:flex flex-col items-end">
                <span class="text-sm font-bold text-navy-blue leading-tight max-w-[140px] truncate">
                    {{ Auth::user()->nama_lengkap }}
                </span>
                <span class="text-xs font-medium {{ Auth::user()->role->nama_peran == 'Admin' ? 'text-soft-gold' : 'text-steel-blue' }}">
                    {{ Auth::user()->role->nama_peran }}
                </span>
            </div>
            
            <!-- User Avatar -->
            <div class="relative">
                <div class="w-10 h-10 rounded-xl bg-linear-to-br from-navy-blue to-steel-blue shadow flex items-center justify-center text-white font-bold text-lg select-none overflow-hidden hover:shadow-md transition-all duration-200">
                    {{ strtoupper(substr(Auth::user()->nama_lengkap, 0, 1)) }}
                    
                    <!-- Status Indicator -->
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></div>
                    
                    <!-- Gold accent for Admin -->
                    @if(Auth::user()->role->nama_peran == 'Admin')
                        <div class="absolute inset-0 rounded-xl border border-soft-gold/40"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Fungsi untuk menandai notifikasi sebagai dibaca
    function markNotificationAsRead(notificationId, redirectUrl) {
        // Kirim request untuk menandai sebagai dibaca
        fetch(`/notifikasi/baca/${notificationId}`, {
            method: 'GET', // Route Anda adalah GET, bukan POST
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (response.ok || response.redirected) {
                // Jika response OK atau redirect, lanjutkan ke redirectUrl
                if (redirectUrl !== '#' && redirectUrl !== '') {
                    window.location.href = redirectUrl;
                } else {
                    location.reload();
                }
            } else {
                throw new Error('Network response was not ok.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Tetap redirect meski ada error
            if (redirectUrl !== '#' && redirectUrl !== '') {
                window.location.href = redirectUrl;
            } else {
                location.reload();
            }
        });
    }

    // Fungsi untuk menandai semua notifikasi sebagai dibaca
    function markAllAsRead() {
        // Arahkan langsung ke route karena sudah ada di href
        // Function ini hanya untuk backup jika onclick tidak berfungsi
    }
</script>

<style>
    /* Custom Color Variables */
    :root {
        --navy-blue: #0A2540;
        --steel-blue: #334E68;
        --off-white: #F8F9FB;
        --white: #FFFFFF;
        --charcoal: #111827;
        --soft-gray: #E5E7EB;
        --soft-gold: #C9A24D;
        --soft-gold-dark: #B08C3A;
    }
    
    .bg-navy-blue { background-color: var(--navy-blue); }
    .text-navy-blue { color: var(--navy-blue); }
    .bg-steel-blue { background-color: var(--steel-blue); }
    .text-steel-blue { color: var(--steel-blue); }
    .bg-off-white { background-color: var(--off-white); }
    .text-charcoal { color: var(--charcoal); }
    .border-soft-gray { border-color: var(--soft-gray); }
    .bg-soft-gold { background-color: var(--soft-gold); }
    .text-soft-gold { color: var(--soft-gold); }
    .text-soft-gold-dark { color: var(--soft-gold-dark); }
    
    /* Utilities */
    .line-clamp-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
    
    /* Gradient */
    .bg-linear-to-r {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
    }
    
    .bg-linear-to-br {
        background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
    }
    
    /* Focus styles */
    .focus\:ring-soft-gold\/30:focus {
        --tw-ring-color: rgba(201, 162, 77, 0.3);
    }
</style>