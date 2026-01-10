@extends('layouts.app')

@section('title', 'Laporan Rekapitulasi')

@section('content')
<div class="min-h-screen bg-off-white py-4 sm:py-6">
    <div class="container mx-auto px-3 sm:px-4 max-w-4xl">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
                <div class="w-full">
                    <h1 class="text-2xl sm:text-3xl font-bold text-navy-blue mb-1">Laporan Rekapitulasi Arsip</h1>
                    <p class="text-sm sm:text-base text-steel-blue/80 font-medium">Hasilkan laporan rekapitulasi dokumen dalam format PDF</p>
                </div>
                
                <a href="{{ route('dokumen.index') }}" 
                   class="w-full md:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-2.5 sm:py-3 bg-white text-navy-blue font-semibold rounded-xl shadow-lg border border-soft-gray hover:bg-off-white hover:shadow-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span class="text-sm sm:text-base">Kembali</span>
                </a>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
            <!-- Card Header - Diubah ke solid #0A2540 -->
            <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-white">Form Pencetakan Laporan</h3>
                </div>
            </div>

            <!-- Card Content -->
            <div class="p-4 sm:p-6">
                <!-- Info Alert -->
                <div class="mb-6 sm:mb-8 bg-gradient-to-r from-blue-50 to-sky-50 border-l-4 border-blue-500 rounded-r-lg p-4 shadow-sm">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-blue-700 mb-1">Panduan Penggunaan</p>
                            <p class="text-sm text-blue-600/90">
                                Pilih periode tanggal dan kategori dokumen yang ingin dicetak. Laporan akan di-generate dalam format <strong class="font-semibold">PDF</strong>.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form id="formCetakLaporan" action="{{ route('laporan.cetak') }}" method="POST" target="_blank">
                    @csrf
                    
                    <!-- Date Range Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-navy-blue">
                                Dari Tanggal <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-steel-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <input type="date" 
                                       name="tgl_awal" 
                                       id="tglAwal" 
                                       class="w-full pl-11 pr-4 py-3 text-sm sm:text-base bg-off-white border border-soft-gray rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/20 focus:border-navy-blue transition-all duration-200" 
                                       required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-navy-blue">
                                Sampai Tanggal <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-steel-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <input type="date" 
                                       name="tgl_akhir" 
                                       id="tglAkhir" 
                                       class="w-full pl-11 pr-4 py-3 text-sm sm:text-base bg-off-white border border-soft-gray rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/20 focus:border-navy-blue transition-all duration-200" 
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-navy-blue mb-2">Kategori Dokumen</label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-steel-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            <select name="kategori" 
                                    id="pilihKategori" 
                                    class="w-full pl-11 pr-4 py-3 text-sm sm:text-base bg-off-white border border-soft-gray rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/20 focus:border-navy-blue transition-all duration-200 appearance-none">
                                <option value="">-- Semua Kategori --</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-steel-blue/60 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="button" 
                            onclick="cekLaporan()" 
                            class="w-full inline-flex items-center justify-center px-6 py-4 bg-navy-blue text-white font-semibold rounded-xl shadow-lg hover:bg-steel-blue hover:shadow-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-navy-blue/50 group">
                        <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        <span class="text-sm sm:text-base">Cetak Laporan PDF</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div id="laporanModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen px-3 sm:px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-60 transition-opacity" aria-hidden="true"></div>

        <!-- Modal Content -->
        <div class="inline-block align-bottom bg-white rounded-xl sm:rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border-2 border-navy-blue">
            <!-- Modal Header - Diubah ke solid #0A2540 -->
            <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-semibold text-white" id="modalTitle">Memuat Data...</h3>
                    </div>
                    <button onclick="closeModal()" 
                            class="p-2 rounded-lg hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="bg-white px-4 sm:px-6 py-5">
                <div class="mb-4">
                    <p class="text-sm text-navy-blue font-medium mb-3">Preview dokumen yang akan dicetak:</p>
                    
                    <!-- Table Container -->
                    <div class="border border-navy-blue/20 rounded-lg sm:rounded-xl overflow-hidden bg-off-white/30">
                        <div class="overflow-x-auto max-h-64">
                            <table class="min-w-full divide-y divide-navy-blue/20">
                                <thead class="bg-navy-blue/80 sticky top-0">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Judul</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Kategori</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody id="listLaporanContainer" class="bg-white divide-y divide-navy-blue/10">
                                    <tr>
                                        <td colspan="3" class="px-4 py-8 text-center text-navy-blue/60">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="w-8 h-8 mb-2 text-navy-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                </svg>
                                                <p class="text-sm text-navy-blue/60">Sedang mengambil data...</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Info Footer -->
                    <div class="flex justify-between items-center mt-4 px-1">
                        <p class="text-xs text-navy-blue/60" id="modalInfoText">
                            Pastikan data yang ditampilkan sudah benar sebelum mencetak.
                        </p>
                        <p class="text-xs font-semibold text-navy-blue" id="totalLaporanInfo"></p>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="bg-navy-blue/5 px-4 sm:px-6 py-4 border-t border-navy-blue/20">
                <div class="flex flex-col sm:flex-row-reverse gap-3">
                    <button type="button" 
                            onclick="confirmCetak()" 
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-navy-blue text-white font-semibold rounded-xl shadow-lg hover:bg-steel-blue hover:shadow-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-white/50 border border-white/20">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        <span class="text-white">Ya, Cetak PDF</span>
                    </button>
                    <button type="button" 
                            onclick="closeModal()" 
                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-white text-navy-blue font-semibold rounded-xl shadow-lg border border-navy-blue/20 hover:bg-navy-blue/5 hover:shadow-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                        <span class="text-navy-blue">Batal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function cekLaporan() {
        const tglAwal = document.getElementById('tglAwal').value;
        const tglAkhir = document.getElementById('tglAkhir').value;
        const kategori = document.getElementById('pilihKategori').value;
        
        // Validasi tanggal
        if(!tglAwal || !tglAkhir) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Harap isi tanggal awal dan tanggal akhir terlebih dahulu.',
                confirmButtonColor: '#0A2540',
                confirmButtonText: 'Mengerti'
            });
            return;
        }

        // Validasi jika tanggal akhir lebih kecil dari tanggal awal
        if(new Date(tglAkhir) < new Date(tglAwal)) {
            Swal.fire({
                icon: 'error',
                title: 'Format Tidak Valid',
                text: 'Tanggal akhir tidak boleh lebih kecil dari tanggal awal.',
                confirmButtonColor: '#0A2540',
                confirmButtonText: 'Mengerti'
            });
            return;
        }

        const listContainer = document.getElementById('listLaporanContainer');
        const modal = document.getElementById('laporanModal');
        const title = document.getElementById('modalTitle');
        const info = document.getElementById('totalLaporanInfo');
        const modalInfo = document.getElementById('modalInfoText');

        // Buka Modal Loading
        modal.classList.remove('hidden');
        title.innerText = "Memuat Data...";
        modalInfo.innerText = "Sedang mengambil data dari server...";
        listContainer.innerHTML = `
            <tr>
                <td colspan="3" class="px-4 py-8 text-center text-navy-blue/60">
                    <div class="flex flex-col items-center justify-center">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-navy-blue mb-2"></div>
                        <p class="text-sm text-navy-blue/60">Memuat data laporan...</p>
                    </div>
                </td>
            </tr>
        `;
        info.innerText = "";

        // Panggil AJAX
        fetch('{{ route("laporan.check") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ 
                tgl_awal: tglAwal,
                tgl_akhir: tglAkhir,
                kategori: kategori 
            })
        })
        .then(response => response.json())
        .then(resp => {
            if(resp.status === 'success') {
                title.innerText = "Siap Mencetak Laporan";
                modalInfo.innerText = "Pastikan data yang ditampilkan sudah benar sebelum mencetak.";
                
                let html = '';
                if (resp.data.length > 0) {
                    resp.data.forEach(item => {
                        html += `
                            <tr class="hover:bg-navy-blue/5 transition-colors duration-150">
                                <td class="px-4 py-3 text-sm text-navy-blue font-medium" title="${item.judul}">
                                    ${item.judul.length > 35 ? item.judul.substring(0, 35) + '...' : item.judul}
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-navy-blue/10 text-navy-blue border border-navy-blue/20">
                                        ${item.kategori}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-steel-blue font-medium whitespace-nowrap">
                                    ${item.tanggal}
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    html = `
                        <tr>
                            <td colspan="3" class="px-4 py-8 text-center text-navy-blue/60">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-10 h-10 mb-3 text-navy-blue/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-base font-medium text-navy-blue/60 mb-1">Tidak ada data</p>
                                    <p class="text-sm text-navy-blue/40">Tidak ditemukan dokumen pada periode yang dipilih</p>
                                </div>
                            </td>
                        </tr>
                    `;
                }
                listContainer.innerHTML = html;
                
                if (resp.count > 0) {
                    info.innerText = "Total: " + resp.count + " dokumen";
                    info.classList.remove('text-red-500', 'text-yellow-500');
                    info.classList.add('text-navy-blue', 'font-semibold');
                } else {
                    info.innerText = "Tidak ada data";
                    info.classList.remove('text-navy-blue', 'text-yellow-500');
                    info.classList.add('text-navy-blue/60');
                }
            } else {
                title.innerText = "Data Tidak Ditemukan";
                modalInfo.innerText = resp.message || "Periksa kembali filter yang Anda gunakan.";
                listContainer.innerHTML = `
                    <tr>
                        <td colspan="3" class="px-4 py-8 text-center text-navy-blue/60">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-10 h-10 mb-3 text-navy-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <p class="text-base font-medium text-navy-blue/70 mb-1">${resp.message || 'Data kosong'}</p>
                                <p class="text-sm text-navy-blue/60">Silakan coba dengan filter yang berbeda</p>
                            </div>
                        </td>
                    </tr>
                `;
                info.innerText = "Tidak ada data";
                info.classList.remove('text-navy-blue', 'text-yellow-500');
                info.classList.add('text-navy-blue/60');
            }
        })
        .catch(error => {
            console.error(error);
            title.innerText = "Kesalahan Koneksi";
            modalInfo.innerText = "Terjadi kesalahan saat menghubungi server.";
            listContainer.innerHTML = `
                <tr>
                    <td colspan="3" class="px-4 py-8 text-center text-navy-blue/60">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-10 h-10 mb-3 text-navy-blue/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-base font-medium text-navy-blue/70 mb-1">Koneksi Terputus</p>
                            <p class="text-sm text-navy-blue/60">Periksa koneksi internet Anda</p>
                        </div>
                    </td>
                </tr>
            `;
            info.innerText = "Kesalahan jaringan";
            info.classList.remove('text-navy-blue', 'text-yellow-500');
            info.classList.add('text-navy-blue/60');
        });
    }

    function closeModal() {
        document.getElementById('laporanModal').classList.add('hidden');
    }

    function confirmCetak() {
        const tglAwal = document.getElementById('tglAwal').value;
        const tglAkhir = document.getElementById('tglAkhir').value;
        
        if(!tglAwal || !tglAkhir) {
            closeModal();
            return;
        }
        
        document.getElementById('formCetakLaporan').submit();
        closeModal();
        
        // Optional: Show success toast
        setTimeout(() => {
            if(typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Sedang Mencetak',
                    text: 'Laporan sedang diproses dan akan terbuka di tab baru.',
                    timer: 2000,
                    showConfirmButton: false,
                    confirmButtonColor: '#0A2540'
                });
            }
        }, 500);
    }

    // Set default dates (current month)
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
        
        // Format to YYYY-MM-DD
        const formatDate = (date) => date.toISOString().split('T')[0];
        
        document.getElementById('tglAwal').value = formatDate(firstDay);
        document.getElementById('tglAkhir').value = formatDate(today);
        
        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') {
                closeModal();
            }
        });
    });
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
    
    /* Focus ring */
    .focus\:ring-navy-blue\/20:focus {
        --tw-ring-color: rgba(10, 37, 64, 0.2) !important;
    }
    
    .focus\:ring-navy-blue\/50:focus {
        --tw-ring-color: rgba(10, 37, 64, 0.5) !important;
    }
    
    /* Gradient */
    .bg-gradient-to-r {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
    }
    
    /* Animation */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-spin {
        animation: spin 1s linear infinite;
    }
    
    /* Custom scrollbar for modal */
    #listLaporanContainer::-webkit-scrollbar {
        width: 6px;
    }
    
    #listLaporanContainer::-webkit-scrollbar-track {
        background: rgba(10, 37, 64, 0.05);
        border-radius: 3px;
    }
    
    #listLaporanContainer::-webkit-scrollbar-thumb {
        background: rgba(10, 37, 64, 0.2);
        border-radius: 3px;
    }
    
    #listLaporanContainer::-webkit-scrollbar-thumb:hover {
        background: rgba(10, 37, 64, 0.3);
    }
    
    /* Modal border */
    .border-navy-blue {
        border-color: #0A2540 !important;
    }
    
    .border-navy-blue\/20 {
        border-color: rgba(10, 37, 64, 0.2) !important;
    }
    
    /* Table header styling */
    .bg-navy-blue\/80 {
        background-color: rgba(10, 37, 64, 0.8) !important;
    }
    
    /* Text white */
    .text-white {
        color: white !important;
    }
    
    /* Background with opacity */
    .bg-navy-blue\/5 {
        background-color: rgba(10, 37, 64, 0.05) !important;
    }
</style>
@endsection