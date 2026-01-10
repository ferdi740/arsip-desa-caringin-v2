@extends('layouts.app')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="min-h-screen bg-off-white py-4 sm:py-6">
    <div class="container mx-auto px-3 sm:px-4">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
                <div class="w-full">
                    <h1 class="text-2xl sm:text-3xl font-bold text-navy-blue mb-1">Manajemen Kategori Dokumen</h1>
                    <p class="text-sm sm:text-base text-steel-blue/80 font-medium">Kelola kategori dokumen dan masa retensi penyimpanan</p>
                </div>
                
                <div class="w-full md:w-auto text-sm text-navy-blue font-medium">
                    {{ $kategori->count() }} kategori terdaftar
                </div>
            </div>
        </div>

        <!-- Success Alert -->
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

        <!-- Main Content Grid -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left Column - Add Form -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
                    <!-- Form Header - Diubah ke solid #0A2540 -->
                    <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                        <div class="flex items-center">
                            <h3 class="text-lg sm:text-xl font-semibold text-white">Tambah Kategori Baru</h3>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-4 sm:p-6">
                        @if ($errors->any())
                        <div class="mb-6 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 rounded-r-lg p-4" role="alert">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-red-700 mb-1">Terdapat kesalahan dalam pengisian</p>
                                    <ul class="text-sm text-red-600 list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-5">
                            @csrf
                            
                            <!-- Nama Kategori -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-navy-blue">
                                    Nama Kategori <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-steel-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <input type="text" 
                                           name="nama_kategori" 
                                           class="w-full pl-11 pr-4 py-3 text-sm sm:text-base bg-off-white border border-soft-gray rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/20 focus:border-navy-blue transition-all duration-200" 
                                           placeholder="Contoh: Surat Perjanjian" 
                                           required>
                                </div>
                            </div>

                            <!-- Masa Retensi -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-navy-blue">
                                    Masa Retensi <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-steel-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <input type="number" 
                                           name="masa_retensi" 
                                           class="w-full pl-11 pr-4 py-3 text-sm sm:text-base bg-off-white border border-soft-gray rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-navy-blue/20 focus:border-navy-blue transition-all duration-200" 
                                           value="5" 
                                           min="1" 
                                           max="100" 
                                           required>
                                    <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-sm text-steel-blue/60 font-medium">Tahun</span>
                                </div>
                                <p class="text-xs text-steel-blue/60 mt-1">Berapa tahun dokumen wajib disimpan?</p>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" 
                                    class="w-full inline-flex items-center justify-center px-6 py-3 bg-navy-blue text-white font-semibold rounded-xl shadow-lg hover:bg-steel-blue hover:shadow-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span class="text-sm sm:text-base">Tambah Kategori</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Categories List -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg border border-soft-gray overflow-hidden">
                    <!-- Table Header - Diubah ke solid #0A2540 -->
                    <div class="px-4 sm:px-6 py-4 sm:py-5 bg-navy-blue">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-0">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                <h3 class="text-base sm:text-lg font-semibold text-white">Daftar Kategori Dokumen</h3>
                            </div>
                            <div class="text-xs sm:text-sm text-white/90 font-medium">
                                {{ $kategori->count() }} kategori terdaftar
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Table -->
                    <div class="hidden md:block">
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="bg-off-white">
                                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">
                                            Nama Kategori
                                        </th>
                                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">
                                            Masa Retensi
                                        </th>
                                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">
                                            Jumlah Dokumen
                                        </th>
                                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs font-semibold text-navy-blue uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-soft-gray">
                                    @foreach($kategori as $k)
                                    <tr class="hover:bg-off-white/50 transition-colors duration-150">
                                        <form action="{{ route('admin.kategori.update', $k->id) }}" method="POST" id="form-edit-{{ $k->id }}">
                                            @csrf
                                            @method('PUT')
                                            <td class="px-4 sm:px-6 py-3 sm:py-4">
                                                <div class="relative group">
                                                    <input type="text" 
                                                           name="nama_kategori" 
                                                           value="{{ $k->nama_kategori }}" 
                                                           class="w-full px-3 py-2 text-sm bg-transparent border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-navy-blue/20 focus:border-navy-blue hover:border-soft-gray transition-all duration-200 group-hover:bg-off-white/50 group-focus-within:bg-white"
                                                           onchange="document.getElementById('form-edit-{{ $k->id }}').submit()">
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-3 sm:py-4">
                                                <div class="flex items-center">
                                                    <div class="relative group">
                                                        <input type="number" 
                                                               name="masa_retensi" 
                                                               value="{{ $k->masa_retensi }}" 
                                                               class="w-20 px-3 py-2 text-sm bg-transparent border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-navy-blue/20 focus:border-navy-blue hover:border-soft-gray transition-all duration-200 group-hover:bg-off-white/50 group-focus-within:bg-white"
                                                               min="1"
                                                               onchange="document.getElementById('form-edit-{{ $k->id }}').submit()">
                                                    </div>
                                                    <span class="text-xs text-steel-blue/60 ml-2">Tahun</span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-3 sm:py-4">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-lg bg-navy-blue/10 flex items-center justify-center mr-2">
                                                        <svg class="w-4 h-4 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm font-medium text-charcoal">
                                                        {{ $k->dokumen_count }} dokumen
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-3 sm:py-4">
                                                <div class="flex items-center space-x-2">
                                                    <!-- Update Button (Hidden for inline edit) -->
                                                    <button type="submit" 
                                                            class="hidden items-center px-3 py-1.5 text-xs font-medium rounded-lg bg-navy-blue text-white hover:bg-steel-blue transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-navy-blue/50">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                        Update
                                                    </button>
                                                </form>
                                                    
                                                    <!-- Delete Form -->
                                                    <form action="{{ route('admin.kategori.destroy', $k->id) }}" 
                                                          method="POST" 
                                                          class="inline-block delete-category-form"
                                                          data-kategori-name="{{ $k->nama_kategori }}"
                                                          data-dokumen-count="{{ $k->dokumen_count }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500/50"
                                                                title="Hapus Kategori">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Mobile Cards View -->
                    <div class="md:hidden">
                        <div class="divide-y divide-soft-gray">
                            @foreach($kategori as $k)
                            <div class="p-4 hover:bg-off-white/30 transition-colors duration-150">
                                <form action="{{ route('admin.kategori.update', $k->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <!-- Category Header -->
                                    <div class="flex items-start mb-3">
                                        <div class="shrink-0 w-10 h-10 rounded-lg bg-navy-blue/10 flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-navy-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <input type="text" 
                                                   name="nama_kategori" 
                                                   value="{{ $k->nama_kategori }}" 
                                                   class="w-full text-base font-semibold text-navy-blue bg-transparent border-b border-transparent hover:border-soft-gray focus:border-navy-blue focus:outline-none px-1 py-0.5 mb-1"
                                                   placeholder="Nama Kategori">
                                            
                                            <div class="flex items-center text-sm text-steel-blue">
                                                <div class="flex items-center mr-4">
                                                    <svg class="w-4 h-4 mr-1 text-steel-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <input type="number" 
                                                           name="masa_retensi" 
                                                           value="{{ $k->masa_retensi }}" 
                                                           class="w-12 text-sm bg-transparent border-b border-transparent hover:border-soft-gray focus:border-navy-blue focus:outline-none px-1 py-0.5"
                                                           min="1">
                                                    <span class="text-xs text-steel-blue/60 ml-1">Tahun</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1 text-steel-blue/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                    <span class="text-sm">{{ $k->dokumen_count }} dokumen</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex items-center justify-between pt-3 border-t border-soft-gray/50">
                                        <button type="submit" 
                                                class="text-xs font-medium text-navy-blue hover:text-steel-blue transition-colors">
                                            Simpan Perubahan →
                                        </button>
                                        
                                        <form action="{{ route('admin.kategori.destroy', $k->id) }}" 
                                              method="POST" 
                                              class="delete-category-form"
                                              data-kategori-name="{{ $k->nama_kategori }}"
                                              data-dokumen-count="{{ $k->dokumen_count }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="p-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 transition-colors duration-200"
                                                    title="Hapus">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Table Footer -->
                    @if($kategori->count() > 0)
                    <div class="px-4 sm:px-6 py-3 sm:py-4 border-t border-soft-gray bg-off-white">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-0">
                            <div class="text-xs text-steel-blue/60">
                                * Edit langsung pada input field dan perubahan akan otomatis tersimpan
                            </div>
                            <div class="text-xs text-navy-blue/80 font-medium">
                                Total: {{ $kategori->count() }} kategori
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="p-8 text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-off-white flex items-center justify-center">
                            <svg class="w-8 h-8 text-charcoal/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <p class="text-base font-medium text-charcoal/60 mb-1">Belum ada kategori</p>
                        <p class="text-sm text-charcoal/40">Mulai dengan menambahkan kategori pertama Anda</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle delete confirmation with data attributes
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-category-form');
        
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const kategoriName = this.getAttribute('data-kategori-name');
                const dokumenCount = parseInt(this.getAttribute('data-dokumen-count'));
                
                let message = '';
                
                if (dokumenCount > 0) {
                    message = 'Kategori "' + kategoriName + '" memiliki ' + dokumenCount + ' dokumen terkait.\n\n' +
                             'Menghapus kategori ini akan memengaruhi dokumen-dokumen tersebut.\n\n' +
                             'Yakin ingin melanjutkan?';
                } else {
                    message = 'Apakah Anda yakin ingin menghapus kategori "' + kategoriName + '"?';
                }
                
                if (confirm(message)) {
                    this.submit();
                }
            });
        });
        
        // Auto-submit on change for better UX
        const editForms = document.querySelectorAll('form[id^="form-edit-"]');
        
        editForms.forEach(form => {
            const inputs = form.querySelectorAll('input[type="text"], input[type="number"]');
            
            inputs.forEach(input => {
                // Add debounce for auto-save
                let timeout;
                input.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        form.submit();
                    }, 1500); // Submit after 1.5 seconds of inactivity
                });
                
                // Also submit on blur for immediate save
                input.addEventListener('blur', function() {
                    if (input.value !== input.defaultValue) {
                        form.submit();
                    }
                });
            });
        });
        
        // Add visual feedback for editing
        const editableInputs = document.querySelectorAll('input[type="text"], input[type="number"]');
        editableInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('bg-white', 'shadow-sm');
                this.style.backgroundColor = '#FFFFFF';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('bg-white', 'shadow-sm');
                this.style.backgroundColor = 'transparent';
            });
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
    
    /* Editable input styling */
    input[type="text"], input[type="number"] {
        transition: all 0.2s ease;
    }
    
    input[type="text"]:hover, input[type="number"]:hover {
        background-color: rgba(248, 249, 251, 0.5);
    }
    
    input[type="text"]:focus, input[type="number"]:focus {
        background-color: white !important;
        box-shadow: 0 1px 3px rgba(10, 37, 64, 0.1);
    }
    
    /* Navy blue with opacity */
    .text-navy-blue\/80 {
        color: rgba(10, 37, 64, 0.8) !important;
    }
</style>
@endsection