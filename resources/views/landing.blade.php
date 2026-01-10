<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Caringin - Kabupaten Sukabumi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --navy: #0A2540;
            --steel: #334E68;
            --offwhite: #F8F9FB;
            --charcoal: #111827;
            --softgray: #E5E7EB;
            --gold: #C9A24D;
            --gold-light: #E6D3A6;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--offwhite);
            color: var(--charcoal);
            overflow-x: hidden;
        }
        
        .section-padding {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
        
        @media (min-width: 1024px) {
            .section-padding {
                padding-top: 7rem;
                padding-bottom: 7rem;
            }
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(10, 37, 64, 0.98) 0%, rgba(51, 78, 104, 0.95) 100%);
        }
        
        .gold-underline {
            position: relative;
            display: inline-block;
        }
        
        .gold-underline::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 60px;
            height: 3px;
            background-color: var(--gold);
            border-radius: 2px;
        }
        
        .card-shadow {
            box-shadow: 0 10px 40px rgba(10, 37, 64, 0.08);
            transition: all 0.3s ease;
        }
        
        .card-shadow:hover {
            box-shadow: 0 20px 60px rgba(10, 37, 64, 0.15);
            transform: translateY(-5px);
        }
        
        .gold-border {
            border: 1px solid rgba(201, 162, 77, 0.2);
        }
        
        .navy-border {
            border: 1px solid rgba(10, 37, 64, 0.1);
        }
        
        .stat-card {
            background: linear-gradient(135deg, #FFFFFF 0%, #F8F9FB 100%);
            border: 1px solid rgba(10, 37, 64, 0.08);
            backdrop-filter: blur(10px);
        }
        
        .feature-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, rgba(10, 37, 64, 0.05) 0%, rgba(10, 37, 64, 0.1) 100%);
            color: var(--navy);
            font-size: 1.5rem;
        }
        
        .gold-badge {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: var(--navy);
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .nav-link {
            position: relative;
            padding-bottom: 4px;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%230A2540' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--navy) 0%, var(--steel) 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(10, 37, 64, 0.2);
        }
        
        .btn-secondary {
            background: white;
            color: var(--navy);
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            border: 1px solid var(--softgray);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(10, 37, 64, 0.1);
            border-color: var(--gold);
        }
        
        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: var(--navy);
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(201, 162, 77, 0.3);
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        @media (min-width: 768px) {
            .section-title {
                font-size: 3rem;
            }
        }
        
        .section-subtitle {
            color: var(--steel);
            font-size: 1.125rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .gold-divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 100%);
            border-radius: 2px;
            margin: 1.5rem auto;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md border-b navy-border">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, var(--navy) 0%, var(--steel) 100%);">
                        <i class="fas fa-mountain text-white"></i>
                    </div>
                    <div>
                        <div class="font-bold text-xl" style="color: var(--navy);">DESA CARINGIN</div>
                        <div class="text-xs font-medium" style="color: var(--steel);">Kabupaten Sukabumi</div>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#profil" class="nav-link font-medium" style="color: var(--navy);">Profil Desa</a>
                    <a href="#potensi" class="nav-link font-medium" style="color: var(--navy);">Potensi</a>
                    <a href="#layanan" class="nav-link font-medium" style="color: var(--navy);">Layanan</a>
                    <a href="#kontak" class="nav-link font-medium" style="color: var(--navy);">Kontak</a>
                    
                    <div class="h-6 w-px bg-gray-200"></div>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-gold flex items-center gap-2">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-primary flex items-center gap-2">
                                <i class="fas fa-sign-in-alt"></i>
                                Login Pegawai
                            </a>
                        @endauth
                    @endif
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="menu-toggle" class="lg:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="lg:hidden hidden mt-4 pb-4 border-t navy-border pt-4">
                <div class="flex flex-col space-y-4">
                    <a href="#profil" class="font-medium py-2" style="color: var(--navy);">Profil Desa</a>
                    <a href="#potensi" class="font-medium py-2" style="color: var(--navy);">Potensi</a>
                    <a href="#layanan" class="font-medium py-2" style="color: var(--navy);">Layanan</a>
                    <a href="#kontak" class="font-medium py-2" style="color: var(--navy);">Kontak</a>
                    
                    <div class="pt-4 border-t navy-border">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-gold w-full flex justify-center items-center gap-2">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-primary w-full flex justify-center items-center gap-2">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Login Pegawai
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 hero-pattern overflow-hidden relative">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 rounded-full" style="background: radial-gradient(circle, rgba(201, 162, 77, 0.1) 0%, rgba(201, 162, 77, 0) 70%);"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 rounded-full" style="background: radial-gradient(circle, rgba(10, 37, 64, 0.05) 0%, rgba(10, 37, 64, 0) 70%);"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="w-full lg:w-1/2 text-center lg:text-left mb-12 lg:mb-0">
                    <div class="mb-6">
                        <span class="gold-badge">
                            <i class="fas fa-certificate"></i>
                            WEBSITE RESMI PEMERINTAH
                        </span>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6" style="color: var(--navy);">
                        Selamat Datang di <br>
                        <span class="gold-underline">Desa Caringin</span>
                    </h1>
                    
                    <p class="text-lg mb-10 max-w-xl mx-auto lg:mx-0" style="color: var(--steel);">
                        Mewujudkan Desa Caringin yang Mandiri, Sejahtera, dan Religius melalui tata kelola pemerintahan yang transparan dan pelayanan publik yang prima.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#profil" class="btn-primary flex items-center justify-center gap-2">
                            <i class="fas fa-compass"></i>
                            Jelajahi Desa
                        </a>
                        <a href="#layanan" class="btn-secondary flex items-center justify-center gap-2">
                            <i class="fas fa-hands-helping"></i>
                            Layanan Warga
                        </a>
                    </div>
                </div>
                
                <div class="w-full lg:w-1/2 lg:pl-12">
                    <div class="relative">
                        <div class="floating-element">
                            <div class="stat-card rounded-2xl p-8 card-shadow">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="text-center p-6 rounded-xl" style="background-color: rgba(10, 37, 64, 0.03);">
                                        <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background: linear-gradient(135deg, var(--navy) 0%, var(--steel) 100%);">
                                            <i class="fas fa-mountain text-white text-xl"></i>
                                        </div>
                                        <div class="text-3xl font-bold mb-2" style="color: var(--navy);">1.250</div>
                                        <div class="font-medium" style="color: var(--steel);">Hektar Luas Wilayah</div>
                                    </div>
                                    
                                    <div class="text-center p-6 rounded-xl" style="background-color: rgba(201, 162, 77, 0.05);">
                                        <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);">
                                            <i class="fas fa-users text-white text-xl"></i>
                                        </div>
                                        <div class="text-3xl font-bold mb-2" style="color: var(--navy);">5.420</div>
                                        <div class="font-medium" style="color: var(--steel);">Jumlah Penduduk</div>
                                    </div>
                                </div>
                                
                                <div class="mt-8 pt-8 border-t border-gray-100">
                                    <div class="flex items-center justify-center gap-4">
                                        <div class="text-center">
                                            <div class="text-2xl font-bold" style="color: var(--navy);">12</div>
                                            <div class="text-sm" style="color: var(--steel);">Dusun</div>
                                        </div>
                                        <div class="h-8 w-px bg-gray-200"></div>
                                        <div class="text-center">
                                            <div class="text-2xl font-bold" style="color: var(--navy);">1980</div>
                                            <div class="text-sm" style="color: var(--steel);">Tahun Berdiri</div>
                                        </div>
                                        <div class="h-8 w-px bg-gray-200"></div>
                                        <div class="text-center">
                                            <div class="text-2xl font-bold" style="color: var(--navy);">85%</div>
                                            <div class="text-sm" style="color: var(--steel);">Produktif</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="section-padding bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title">Profil Desa</h2>
                <div class="gold-divider"></div>
                <p class="section-subtitle">
                    Desa Caringin terletak di Kecamatan Gegerbitung, Kabupaten Sukabumi. 
                    Dikenal dengan keindahan alam yang asri dan kearifan lokal masyarakat yang menjunjung tinggi nilai gotong royong.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Visi Card -->
                <div class="rounded-2xl p-8 card-shadow gold-border">
                    <div class="feature-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4" style="color: var(--navy);">Visi Desa</h3>
                    <p class="mb-6" style="color: var(--steel);">
                        Terwujudnya Desa Caringin yang Maju, Agamis, dan Berdaya Saing melalui Pembangunan Berkelanjutan.
                    </p>
                    <div class="flex items-center text-sm font-medium" style="color: var(--gold);">
                        <span>Panduan Pembangunan</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
                
                <!-- Misi Card -->
                <div class="rounded-2xl p-8 card-shadow gold-border">
                    <div class="feature-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4" style="color: var(--navy);">Misi Desa</h3>
                    <p class="mb-6" style="color: var(--steel);">
                        Meningkatkan kualitas SDM, memperkuat ekonomi kerakyatan, dan mewujudkan tata kelola pemerintahan yang bersih dan transparan.
                    </p>
                    <div class="flex items-center text-sm font-medium" style="color: var(--gold);">
                        <span>Langkah Strategis</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
                
                <!-- Sejarah Card -->
                <div class="rounded-2xl p-8 card-shadow gold-border">
                    <div class="feature-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4" style="color: var(--navy);">Sejarah Desa</h3>
                    <p class="mb-6" style="color: var(--steel);">
                        Berdiri sejak tahun 1980, Desa Caringin merupakan pemekaran wilayah yang kini berkembang menjadi pusat agrowisata dan pertanian organik.
                    </p>
                    <div class="flex items-center text-sm font-medium" style="color: var(--gold);">
                        <span>Warisan Budaya</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Potensi Section -->
    <section id="potensi" class="section-padding" style="background-color: var(--offwhite);">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-16">
                <div class="mb-8 lg:mb-0 lg:w-1/2">
                    <h2 class="section-title">Potensi & Keunggulan</h2>
                    <div class="gold-divider" style="margin: 1.5rem 0;"></div>
                    <p class="section-subtitle text-left mx-0">
                        Desa Caringin memiliki berbagai potensi unggulan yang menjadi pondasi kemajuan dan kesejahteraan masyarakat.
                    </p>
                </div>
                
                <div class="lg:w-1/2 lg:text-right">
                    <span class="gold-badge">
                        <i class="fas fa-star"></i>
                        Unggulan Lokal
                    </span>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pertanian -->
                <div class="rounded-2xl overflow-hidden bg-white card-shadow">
                    <div class="h-48 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(51, 78, 104, 0.9) 100%);">
                            <i class="fas fa-seedling text-6xl text-white"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-2" style="background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 100%);"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold mb-4" style="color: var(--navy);">Pertanian & Perkebunan</h3>
                        <p class="mb-6" style="color: var(--steel);">
                            Penghasil padi, sayuran organik, dan buah-buahan berkualitas tinggi yang memasok pasar regional.
                        </p>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3" style="background-color: rgba(10, 37, 64, 0.1);">
                                <i class="fas fa-leaf text-xs" style="color: var(--navy);"></i>
                            </div>
                            <span class="text-sm font-medium" style="color: var(--navy);">Produk Organik</span>
                        </div>
                    </div>
                </div>
                
                <!-- UMKM -->
                <div class="rounded-2xl overflow-hidden bg-white card-shadow">
                    <div class="h-48 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(51, 78, 104, 0.9) 100%);">
                            <i class="fas fa-industry text-6xl text-white"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-2" style="background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 100%);"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold mb-4" style="color: var(--navy);">UMKM & Kerajinan</h3>
                        <p class="mb-6" style="color: var(--steel);">
                            Produk olahan makanan tradisional dan kerajinan tangan anyaman bambu khas warga desa.
                        </p>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3" style="background-color: rgba(10, 37, 64, 0.1);">
                                <i class="fas fa-hands text-xs" style="color: var(--navy);"></i>
                            </div>
                            <span class="text-sm font-medium" style="color: var(--navy);">Kerajinan Tangan</span>
                        </div>
                    </div>
                </div>
                
                <!-- Wisata -->
                <div class="rounded-2xl overflow-hidden bg-white card-shadow">
                    <div class="h-48 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(51, 78, 104, 0.9) 100%);">
                            <i class="fas fa-umbrella-beach text-6xl text-white"></i>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-2" style="background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 100%);"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold mb-4" style="color: var(--navy);">Wisata Alam</h3>
                        <p class="mb-6" style="color: var(--steel);">
                            Destinasi wisata curug (air terjun) dan jalur trekking perbukitan yang menawan.
                        </p>
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3" style="background-color: rgba(10, 37, 64, 0.1);">
                                <i class="fas fa-tree text-xs" style="color: var(--navy);"></i>
                            </div>
                            <span class="text-sm font-medium" style="color: var(--navy);">Ekowisata</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="section-padding hero-gradient text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="section-title text-white">Sistem Pemerintahan Digital</h2>
                <div class="gold-divider"></div>
                <p class="section-subtitle text-gray-300">
                    Pemerintah Desa Caringin berkomitmen meningkatkan transparansi dan kecepatan pelayanan melalui sistem arsip dan administrasi digital terpadu.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Layanan Warga -->
                <div class="rounded-2xl p-8" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px);">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4" style="background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold">Layanan Warga</h3>
                    </div>
                    <p class="mb-6 text-gray-300">
                        Pengurusan surat pengantar, KTP, KK, dan dokumen kependudukan lainnya dilayani setiap hari kerja dengan sistem yang terintegrasi.
                    </p>
                    <div class="bg-white/10 p-4 rounded-lg border border-white/20">
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-3" style="color: var(--gold);"></i>
                            <div>
                                <div class="font-bold">Senin - Jumat</div>
                                <div class="text-sm text-gray-300">08.00 - 15.00 WIB</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Akses Perangkat Desa -->
                <div class="rounded-2xl p-8 relative overflow-hidden" style="background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);">
                    <div class="absolute top-0 right-0 w-32 h-32 rounded-full -mt-16 -mr-16 opacity-20" style="background-color: var(--navy);"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4" style="background-color: var(--navy);">
                                <i class="fas fa-lock text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold" style="color: var(--navy);">Akses Perangkat Desa</h3>
                        </div>
                        <p class="mb-8" style="color: var(--navy);">
                            Masuk ke sistem arsip digital untuk pengelolaan dokumen desa secara terintegrasi dan aman.
                        </p>
                        
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary inline-flex items-center gap-2" style="background: var(--navy);">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Buka Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-primary inline-flex items-center gap-2" style="background: var(--navy);">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Login Sistem
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Fitur Layanan -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-6 rounded-xl" style="background: rgba(255, 255, 255, 0.05);">
                    <i class="fas fa-file-contract text-3xl mb-4" style="color: var(--gold);"></i>
                    <div class="font-bold mb-2">Surat Menyurat</div>
                    <div class="text-sm text-gray-300">Digital & Terintegrasi</div>
                </div>
                
                <div class="text-center p-6 rounded-xl" style="background: rgba(255, 255, 255, 0.05);">
                    <i class="fas fa-archive text-3xl mb-4" style="color: var(--gold);"></i>
                    <div class="font-bold mb-2">Arsip Digital</div>
                    <div class="text-sm text-gray-300">Terorganisir & Aman</div>
                </div>
                
                <div class="text-center p-6 rounded-xl" style="background: rgba(255, 255, 255, 0.05);">
                    <i class="fas fa-chart-line text-3xl mb-4" style="color: var(--gold);"></i>
                    <div class="font-bold mb-2">Data Statistik</div>
                    <div class="text-sm text-gray-300">Real-time & Akurat</div>
                </div>
                
                <div class="text-center p-6 rounded-xl" style="background: rgba(255, 255, 255, 0.05);">
                    <i class="fas fa-bullhorn text-3xl mb-4" style="color: var(--gold);"></i>
                    <div class="font-bold mb-2">Pengumuman</div>
                    <div class="text-sm text-gray-300">Cepat & Tepat Sasaran</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="pt-16 pb-8 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Logo & Info -->
                <div>
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3" style="background: linear-gradient(135deg, var(--navy) 0%, var(--steel) 100%);">
                            <i class="fas fa-mountain text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-xl" style="color: var(--navy);">DESA CARINGIN</div>
                            <div class="text-xs font-medium" style="color: var(--steel);">Kabupaten Sukabumi</div>
                        </div>
                    </div>
                    <p class="mb-6" style="color: var(--steel);">
                        Kecamatan Gegerbitung, Kabupaten Sukabumi, Jawa Barat, Indonesia. Mewujudkan pelayanan publik yang prima untuk masyarakat.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: rgba(10, 37, 64, 0.1); color: var(--navy);">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: rgba(10, 37, 64, 0.1); color: var(--navy);">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: rgba(10, 37, 64, 0.1); color: var(--navy);">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: rgba(10, 37, 64, 0.1); color: var(--navy);">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Kontak -->
                <div>
                    <h4 class="text-lg font-bold mb-6" style="color: var(--navy);">Kontak Kami</h4>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3" style="color: var(--gold);"></i>
                            <div>
                                <div class="font-medium" style="color: var(--navy);">Alamat</div>
                                <div class="text-sm" style="color: var(--steel);">Jl. Raya Caringin No. 1, Kec. Gegerbitung</div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3" style="color: var(--gold);"></i>
                            <div>
                                <div class="font-medium" style="color: var(--navy);">Telepon</div>
                                <div class="text-sm" style="color: var(--steel);">(0266) 123-4567</div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3" style="color: var(--gold);"></i>
                            <div>
                                <div class="font-medium" style="color: var(--navy);">Email</div>
                                <div class="text-sm" style="color: var(--steel);">info@desacaringin.sukabumi.id</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Jam Layanan -->
                <div>
                    <h4 class="text-lg font-bold mb-6" style="color: var(--navy);">Jam Layanan</h4>
                    <div class="space-y-4">
                        <div class="p-4 rounded-lg" style="background-color: rgba(10, 37, 64, 0.03);">
                            <div class="font-medium mb-1" style="color: var(--navy);">Hari Kerja</div>
                            <div class="text-sm" style="color: var(--steel);">Senin - Jumat: 08.00 - 15.00 WIB</div>
                        </div>
                        <div class="p-4 rounded-lg" style="background-color: rgba(201, 162, 77, 0.05);">
                            <div class="font-medium mb-1" style="color: var(--navy);">Layanan Darurat</div>
                            <div class="text-sm" style="color: var(--steel);">24 Jam melalui Call Center</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-200 text-center">
                <p class="text-sm" style="color: var(--steel);">
                    &copy; {{ date('Y') }} Pemerintah Desa Caringin. Hak Cipta Dilindungi.
                </p>
                <p class="text-xs mt-2" style="color: var(--steel); opacity: 0.7;">
                    Dibangun dengan <i class="fas fa-heart" style="color: #ef4444;"></i> untuk kemajuan Desa Caringin
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 rounded-full flex items-center justify-center z-40 opacity-0 transition-opacity duration-300" style="background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%); color: var(--navy); box-shadow: 0 4px 20px rgba(201, 162, 77, 0.3);">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Close mobile menu when clicking a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
        
        // Back to Top Button
        const backToTopButton = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopButton.style.opacity = '1';
            } else {
                backToTopButton.style.opacity = '0';
            }
        });
        
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);
        
        // Observe elements to animate
        document.querySelectorAll('.card-shadow, .section-title, .feature-icon').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>