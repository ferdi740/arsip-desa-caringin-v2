@extends('layouts.app')

@section('title', 'Pusat Backup Data')

@section('content')
<div class="min-h-screen bg-off-white py-4 sm:py-6">
    <div class="container mx-auto px-3 sm:px-4">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
                <div class="w-full">
                    <h1 class="text-2xl sm:text-3xl font-bold text-navy-blue mb-1">Pusat Backup & Restore Sistem</h1>
                    <p class="text-sm sm:text-base text-steel-blue/80 font-medium">Kelola cadangan data arsip untuk keamanan dan pemulihan</p>
                </div>
                
                <div class="text-sm text-navy-blue font-medium self-start sm:self-center">
                    {{ count($tahunTersedia) }} tahun arsip tersedia
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
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-sm sm:text-base text-red-700 font-medium">{{ $errors->first() }}</p>
            </div>
        </div>
        @endif

        <!-- Backup Cards Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Arsip Dokumen Backup Card -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
                <!-- Card Header -->
                <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        <h3 class="text-lg sm:text-xl font-semibold text-white">Backup Arsip Dokumen</h3>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-4 sm:p-6">
                    <div class="mb-6">
                        <p class="text-sm text-charcoal/80 mb-3">
                            Unduh seluruh file dokumen fisik (PDF/Gambar) dalam format <span class="font-semibold text-navy-blue">.ZIP</span>. 
                            Sistem akan menampilkan daftar file terlebih dahulu sebelum mengunduh.
                        </p>
                        <div class="flex items-center text-xs text-steel-blue/60 bg-off-white p-3 rounded-lg">
                            <svg class="w-4 h-4 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            File akan dikompresi dalam format ZIP untuk menghemat ruang penyimpanan
                        </div>
                    </div>

                    <form id="formBackupArsip" action="{{ route('admin.backup.arsip') }}" method="POST" target="_blank">
                        @csrf
                        
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-navy-blue mb-3">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Pilih Tahun Arsip
                                </span>
                            </label>
                            
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="relative flex-1">
                                    <select name="tahun" 
                                            id="pilihTahun" 
                                            class="w-full px-4 py-3 rounded-xl border border-soft-gray bg-white text-charcoal appearance-none focus:outline-none focus:ring-2 focus:ring-navy-blue/30 focus:border-navy-blue/50 transition-all duration-200 cursor-pointer">
                                        @foreach($tahunTersedia as $t)
                                            <option value="{{ $t }}">{{ $t }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-navy-blue">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                                
                                <button type="button" 
                                        onclick="cekFile()" 
                                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-navy-blue text-white font-semibold rounded-xl shadow-lg hover:bg-steel-blue transition-all duration-200 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                    </svg>
                                    Cek & Download
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Card Footer -->
                <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-soft-gray bg-off-white">
                    <div class="text-xs text-steel-blue/60 flex items-center">
                        <svg class="w-3 h-3 mr-2 text-navy-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Pastikan memiliki cukup ruang penyimpanan sebelum mengunduh
                    </div>
                </div>
            </div>

            <!-- Database Backup Card -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
                <!-- Card Header -->
                <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                        </svg>
                        <h3 class="text-lg sm:text-xl font-semibold text-white">Backup Database Sistem</h3>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-4 sm:p-6">
                    <div class="mb-6">
                        <p class="text-sm text-charcoal/80 mb-4">
                            Unduh struktur dan data database dalam format <span class="font-semibold text-navy-blue">.SQL</span>. 
                            File ini berisi semua data sistem termasuk pengguna, kategori, dan metadata.
                        </p>
                        
                        <div class="flex items-center text-xs text-amber-600 bg-amber-50 p-3 rounded-lg border border-amber-100">
                            <svg class="w-4 h-4 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.282 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Hanya untuk keperluan teknis dan administrator sistem
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex-1">
                            <div class="text-sm text-steel-blue/60 mb-2">File database SQL</div>
                            <div class="flex items-center px-4 py-3 rounded-xl border border-soft-gray bg-off-white/50">
                                <svg class="w-5 h-5 text-navy-blue mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="text-sm font-medium text-charcoal">backup_database.sql</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('admin.backup.db') }}" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-navy-blue/10 text-navy-blue font-semibold rounded-xl shadow-sm border border-navy-blue/20 hover:bg-navy-blue hover:text-white transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-navy-blue/30">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download SQL
                        </a>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-soft-gray bg-off-white">
                    <div class="text-xs text-steel-blue/60 flex items-center">
                        <svg class="w-3 h-3 mr-2 text-navy-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Simpan file SQL di lokasi yang aman dan terenkripsi
                    </div>
                </div>
            </div>
        </div>

        <!-- Information Section -->
        <div class="mt-8 bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
            <div class="px-4 sm:px-6 py-4 sm:py-5 bg-gradient-to-r from-navy-blue/10 to-steel-blue/10">
                <h3 class="text-lg font-semibold text-navy-blue flex items-center">
                    <svg class="w-5 h-5 mr-3 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Panduan Backup Sistem
                </h3>
            </div>
            <div class="p-4 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-navy-blue/10 flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-navy-blue mb-1">Jadwal Backup Rutin</p>
                            <p class="text-xs text-steel-blue/70">Lakukan backup arsip dokumen minimal setiap bulan dan backup database setiap 3 bulan</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-navy-blue/10 flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-navy-blue mb-1">Penyimpanan Eksternal</p>
                            <p class="text-xs text-steel-blue/70">Simpan backup di media eksternal seperti hard drive atau cloud storage yang terpisah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- File Preview Modal -->
<div id="fileModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <!-- Modal Content -->
        <div class="inline-block align-bottom bg-white rounded-xl sm:rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
            <!-- Modal Header -->
            <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue rounded-t-xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-white" id="modalTitle">
                            Memindai Dokumen...
                        </h3>
                    </div>
                    <button onclick="closeModal()" class="text-white/80 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-4 sm:p-6">
                <div class="mb-4">
                    <p class="text-sm text-charcoal/70 mb-3">Berikut adalah file yang akan dimasukkan ke dalam ZIP:</p>
                    
                    <div class="border border-soft-gray rounded-xl bg-off-white/50 h-64 overflow-y-auto p-3">
                        <ul id="fileListContainer" class="text-sm text-charcoal divide-y divide-soft-gray/50">
                            <li class="py-4 text-center text-charcoal/50">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-8 h-8 mb-2 animate-spin text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Sedang memindai server...
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                    <p class="text-xs text-right text-steel-blue/60 mt-2" id="totalFilesInfo"></p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-4 sm:px-6 py-4 bg-off-white border-t border-soft-gray rounded-b-xl">
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="button" 
                            onclick="confirmDownload()" 
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-navy-blue text-white font-semibold rounded-xl shadow-lg hover:bg-steel-blue transition-all duration-200 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Download ZIP Sekarang
                    </button>
                    <button type="button" 
                            onclick="closeModal()" 
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white text-navy-blue font-semibold rounded-xl shadow-sm border border-soft-gray hover:bg-off-white transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-navy-blue/30">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function cekFile() {
        const tahun = document.getElementById('pilihTahun').value;
        const listContainer = document.getElementById('fileListContainer');
        const modal = document.getElementById('fileModal');
        const title = document.getElementById('modalTitle');
        const info = document.getElementById('totalFilesInfo');

        // Tampilkan Modal
        modal.classList.remove('hidden');
        title.innerText = "Mengecek Dokumen Tahun " + tahun + "...";
        listContainer.innerHTML = `
            <li class="py-4 text-center text-charcoal/50">
                <div class="flex flex-col items-center justify-center">
                    <svg class="w-8 h-8 mb-2 animate-spin text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Sedang memindai server...
                </div>
            </li>
        `;
        info.innerText = "";

        // Kirim Request AJAX
        fetch('{{ route("admin.backup.check") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ tahun: tahun })
        })
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success') {
                title.innerText = "Siap Mengunduh Arsip Tahun " + tahun;
                let html = '';
                
                if (data.files.length === 0) {
                    html = `
                        <li class="py-8 text-center">
                            <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-off-white flex items-center justify-center">
                                <svg class="w-6 h-6 text-charcoal/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-charcoal/60 font-medium">Tidak ada dokumen</p>
                            <p class="text-xs text-charcoal/40 mt-1">Tidak ditemukan dokumen untuk tahun ${tahun}</p>
                        </li>
                    `;
                } else {
                    data.files.forEach(file => {
                        html += `
                            <li class="py-3 px-2 hover:bg-white rounded-lg transition-colors duration-150">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center truncate">
                                        <svg class="w-4 h-4 mr-2 text-navy-blue/60 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span class="text-xs font-medium text-charcoal truncate" title="${file.name}">${file.name}</span>
                                    </div>
                                    <span class="text-xs font-semibold text-steel-blue bg-navy-blue/5 px-2 py-1 rounded">${file.size}</span>
                                </div>
                            </li>
                        `;
                    });
                }
                
                listContainer.innerHTML = html;
                info.innerText = data.files.length > 0 ? `Total: ${data.count} dokumen ditemukan` : "Tidak ada dokumen";
            } else {
                title.innerText = "Perhatian";
                listContainer.innerHTML = `
                    <li class="py-8 text-center">
                        <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-red-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-red-600 font-medium">${data.message}</p>
                    </li>
                `;
                info.innerText = "";
            }
        })
        .catch(error => {
            console.error('Error:', error);
            title.innerText = "Kesalahan Koneksi";
            listContainer.innerHTML = `
                <li class="py-8 text-center">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-red-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-sm text-red-600 font-medium">Terjadi kesalahan koneksi server</p>
                    <p class="text-xs text-charcoal/40 mt-1">Silakan coba lagi beberapa saat</p>
                </li>
            `;
            info.innerText = "";
        });
    }

    function closeModal() {
        document.getElementById('fileModal').classList.add('hidden');
    }

    function confirmDownload() {
        document.getElementById('formBackupArsip').submit();
        closeModal();
    }
</script>

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
</style>
@endsection