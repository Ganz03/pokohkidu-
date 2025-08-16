{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Beranda - Desa Pokohkidul Wonogiri')

@push('styles')
<style>
    /* Custom animations yang tidak tersedia di Tailwind */
    @keyframes gradientShift {
        0% { opacity: 0.7; }
        100% { opacity: 0.9; }
    }
    
    @keyframes pulse-custom {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .animate-gradient-shift {
        animation: gradientShift 8s ease-in-out infinite alternate;
    }
    
    .animate-pulse-custom {
        animation: pulse-custom 2s ease-in-out infinite;
    }
    
    /* Gradient text untuk hero title */
    .gradient-text {
        background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    /* Custom backdrop blur untuk browser yang belum support */
    .backdrop-blur-custom {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    
    .backdrop-blur-strong {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }

    /* Custom spacing yang spesifik */
    .gap-15 {
        gap: 60px;
    }

    .monument-height {
        height: 280px;
    }

    /* Responsive custom gaps */
    @media (max-width: 1024px) {
        .gap-15 {
            gap: 40px;
        }
    }

    @media (max-width: 768px) {
        .monument-height {
            height: 220px;
        }
    }
    @media (max-width: 1024px) {
        h1 {
            font-size: 2.8rem !important;
        }
    }

    @media (max-width: 768px) {
        section.relative {
            padding: 60px 0 !important;
            min-height: 60vh !important;
        }
        
        h1 {
            font-size: 2.2rem !important;
        }
        
        .hero-subtitle {
            font-size: 1.1rem !important;
        }
        
        .hero-description {
            font-size: 1rem !important;
        }
        
        .btn-custom {
            padding: 12px 24px !important;
            font-size: 14px !important;
        }
        
        .monument-icon {
            font-size: 60px !important;
        }
    }

    @media (max-width: 480px) {
        .hero-container {
            padding: 0 15px !important;
        }
        
        h1 {
            font-size: 1.8rem !important;
        }
        
        .monument-card {
            padding: 20px !important;
        }
    }
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');  
    body {
        font-family: 'Inter', sans-serif;
    }
    
    /* Gallery hover effects */
    .group:hover {
        transform: translateY(-4px);
    }
    
    /* Smooth transitions */
    * {
        transition: all 0.3s ease;
    }
    
    /* Custom animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out;
    }
    
    /* Glassmorphism effect */
    .backdrop-blur-sm {
        backdrop-filter: blur(4px);
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f5f9;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 3px;
    }
</style>
@endpush

@section('content')
{{-- Hero Section --}}
<section class="relative min-h-[70vh] bg-gradient-to-br from-blue-800 to-blue-600 text-white flex items-center overflow-hidden py-20">
    {{-- Background Animation --}}
    <div class="absolute inset-0 opacity-70 animate-gradient-shift">
        <div class="absolute inset-0" style="background: radial-gradient(circle at 20% 30%, rgba(251, 191, 36, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 70%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);"></div>
    </div>
    
    <div class="relative z-10 w-full max-w-[1400px] mx-auto px-5">
        <div class="grid lg:grid-cols-2 gap-15 items-center">
            {{-- Content Section --}}
            <div class="text-white animate-fade-in-left">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-custom border border-white/20 px-4 py-2 rounded-full text-sm font-medium mb-5 animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: both;">
                    <i class="fas fa-map-marker-alt text-yellow-400"></i>
                    Wonogiri, Jawa Tengah
                </div>
                
                {{-- Title from Database --}}
                @if($heroContent)
                <h1 class="font-extrabold leading-tight mb-5 gradient-text animate-fade-in-up" style="font-size: 3.2rem; animation-delay: 0.4s; animation-fill-mode: both;">
                    {{ $heroContent->title }}
                </h1>
                
                {{-- Subtitle from Database --}}
                <p class="font-semibold text-yellow-400 mb-4 animate-fade-in-up" style="font-size: 1.3rem; animation-delay: 0.6s; animation-fill-mode: both;">
                    {{ $heroContent->subtitle }}
                </p>
                
                {{-- Description from Database --}}
                <p class="text-slate-300 leading-relaxed mb-8 animate-fade-in-up" style="font-size: 1.1rem; line-height: 1.7; animation-delay: 0.8s; animation-fill-mode: both;">
                    {{ $heroContent->description }}
                </p>
                @else
                {{-- Fallback content if no hero content found --}}
                <h1 class="font-extrabold leading-tight mb-5 gradient-text animate-fade-in-up" style="font-size: 3.2rem; animation-delay: 0.4s; animation-fill-mode: both;">
                    Selamat Datang di Desa Pokohkidul
                </h1>
                
                <p class="font-semibold text-yellow-400 mb-4 animate-fade-in-up" style="font-size: 1.3rem; animation-delay: 0.6s; animation-fill-mode: both;">
                    Portal Resmi Pemerintah Desa
                </p>
                
                <p class="text-slate-300 leading-relaxed mb-8 animate-fade-in-up" style="font-size: 1.1rem; line-height: 1.7; animation-delay: 0.8s; animation-fill-mode: both;">
                    Temukan informasi terkini tentang pelayanan publik, potensi desa, dan perkembangan 
                    pembangunan di Desa Pokohkidul. Kami berkomitmen memberikan pelayanan terbaik untuk masyarakat.
                </p>
                @endif
                
                {{-- Buttons --}}
                <div class="flex flex-wrap gap-4 animate-fade-in-up" style="animation-delay: 1s; animation-fill-mode: both;">
                    <a href="#" class="inline-flex items-center gap-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-800 font-semibold rounded-full shadow-lg shadow-yellow-400/40 hover:shadow-yellow-400/60 hover:-translate-y-0.5 transition-all duration-300" style="padding: 14px 28px; font-size: 16px;">
                        <i class="fas fa-info-circle"></i>
                        Profil Desa
                    </a>
                    <a href="#" class="inline-flex items-center gap-3 bg-white/10 text-white font-semibold rounded-full border-2 border-white/30 backdrop-blur-custom hover:bg-white/20 hover:border-white/50 hover:-translate-y-0.5 transition-all duration-300" style="padding: 14px 28px; font-size: 16px;">
                        <i class="fas fa-concierge-bell"></i>
                        Layanan Publik
                    </a>
                </div>
            </div>

            {{-- Monument Section --}}
            <div class="animate-fade-in-right">
                <div class="bg-white/95 backdrop-blur-strong rounded-3xl shadow-2xl border border-white/20 relative overflow-hidden" style="padding: 30px;">
                    @if($featuredMonument)
                        {{-- Monument Image from Database --}}
                        <div class="monument-image">
                            @if($featuredMonument->image)
                                <img src="{{ asset('storage/' . $featuredMonument->image) }}" 
                                     alt="{{ $featuredMonument->name }}" 
                                     class="w-full h-64 object-cover rounded-lg"
                                     onerror="this.src='{{ asset('images/default-monument.png') }}';">
                            @else
                                {{-- Fallback if no image --}}
                                <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        {{-- Monument Info from Database --}}
                        <div class="text-gray-800 mt-6">
                            <h3 class="font-bold text-gray-900 mb-3" style="font-size: 1.5rem;">{{ $featuredMonument->name }}</h3>
                            <p class="text-gray-600 leading-relaxed" style="font-size: 15px; line-height: 1.6;">
                                {{ $featuredMonument->description }}
                            </p>
                        </div>
                    @else
                        {{-- Fallback Monument if no featured monument found --}}
                        <div class="w-full bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl flex items-center justify-center mb-5 relative overflow-hidden" style="height: 280px;">
                            <i class="fas fa-monument text-yellow-400 drop-shadow-lg animate-pulse-custom" style="font-size: 80px; text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);"></i>
                        </div>
                        
                        <div class="text-gray-800">
                            <h3 class="font-bold text-gray-900 mb-3" style="font-size: 1.5rem;">Monumen Patung Bedol Desa</h3>
                            <p class="text-gray-600 leading-relaxed" style="font-size: 15px; line-height: 1.6;">
                                Patung Bedol Desa sebagai simbol pengorbanan puluhan ribu warga Wonogiri untuk pembangunan waduk yang memberikan manfaat bagi masyarakat luas.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-br from-blue-100 via-blue-50 to-indigo-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Layanan Masyarakat -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 text-center border border-blue-100 hover:border-blue-300">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl mx-auto mb-6 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <a href="{{ url('/') }}">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </a>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors">
                    Layanan Masyarakat
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Pelayanan administrasi dan bantuan untuk kebutuhan sehari-hari warga desa
                </p>
                <div class="flex justify-center">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-check-circle mr-1"></i>
                        Tersedia 24/7
                    </span>
                </div>
            </div>

            <!-- Potensi Desa -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 text-center border border-blue-100 hover:border-blue-300">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl mx-auto mb-6 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <a href="{{ route('potensi-desa.index') }}">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </a>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-indigo-600 transition-colors">
                    Potensi Desa
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Pengembangan dan promosi potensi unggulan desa untuk kemajuan ekonomi
                </p>
                <div class="flex justify-center">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        <i class="fas fa-trending-up mr-1"></i>
                        Berkembang
                    </span>
                </div>
            </div>

            <!-- Pembangunan Desa -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 text-center border border-blue-100 hover:border-blue-300">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl mx-auto mb-6 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <i class="fas fa-hammer text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-700 transition-colors">
                    Pembangunan Desa
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Program pembangunan infrastruktur dan fasilitas untuk kemajuan desa
                </p>
                <div class="flex justify-center">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-tools mr-1"></i>
                        Aktif
                    </span>
                </div>
            </div>

            <!-- Keuangan Desa -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 text-center border border-blue-100 hover:border-blue-300">
                <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-700 rounded-2xl mx-auto mb-6 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <a href="{{ route('potensi-desa.index') }}">
                        <i class="fas fa-coins text-white text-2xl"></i>
                    </a>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-cyan-600 transition-colors">
                    Keuangan Desa
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Transparansi pengelolaan keuangan dan anggaran desa yang akuntabel
                </p>
                <div class="flex justify-center">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-cyan-100 text-cyan-800">
                        <i class="fas fa-shield-alt mr-1"></i>
                        Transparan
                    </span>
                </div>
            </div>

        </div>

        <!-- Call to Action -->
        <div class="text-center mt-12">
            <p class="text-gray-600 mb-6">Butuh informasi lebih lanjut tentang layanan kami?</p>
            <button class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-8 py-3 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                <i class="fas fa-phone-alt mr-2"></i>
                Hubungi Kami
            </button>
        </div>
    </div>
</section>

<!-- News & Information Section -->
<section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column - Latest News -->
            <div class="lg:col-span-2">
                <!-- Section Header -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <div class="w-1 h-8 bg-blue-600 rounded-full mr-4"></div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                            Berita <span class="text-blue-600">Terkini</span>
                        </h2>
                    </div>
                    <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center transition-colors">
                        Lihat Semua
                        <i class="fas fa-chevron-right ml-2 text-xs"></i>
                    </a>
                </div>

                <!-- News Articles -->
                <div class="space-y-6">
                    @forelse($latestNews as $index => $news)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border border-blue-100">
                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <div class="relative h-48 md:h-full 
                                        @if($index === 0) bg-gradient-to-br from-blue-400 to-blue-600
                                        @elseif($index === 1) bg-gradient-to-br from-indigo-400 to-indigo-600
                                        @else bg-gradient-to-br from-cyan-400 to-cyan-600 @endif 
                                        flex items-center justify-center">
                                        
                                        @if($news->image)
                                            <img src="{{ Storage::url($news->image) }}" 
                                                 alt="{{ $news->title }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <i class="fas 
                                                @if($news->category === 'kegiatan') fa-users
                                                @elseif($news->category === 'pembangunan') fa-hammer
                                                @elseif($news->category === 'pengumuman') fa-megaphone
                                                @else fa-newspaper @endif 
                                                text-white text-4xl opacity-80"></i>
                                        @endif
                                        
                                        <div class="absolute top-3 left-3 
                                            @if($index === 0) bg-blue-600
                                            @elseif($index === 1) bg-indigo-600
                                            @else bg-cyan-600 @endif 
                                            text-white px-3 py-1 rounded-full text-xs font-medium">
                                            {{ $news->published_at->format('M d, Y') }}
                                        </div>
                                        
                                        @if($news->is_featured)
                                            <div class="absolute top-3 right-3 bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                                <i class="fas fa-star mr-1"></i>Utama
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="md:w-2/3 p-6">
                                    <div class="flex items-center mb-2">
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                            {{ ucfirst($news->category) }}
                                        </span>
                                        <span class="text-gray-400 text-xs ml-2">
                                            <i class="fas fa-eye mr-1"></i>{{ $news->views }} views
                                        </span>
                                    </div>
                                    
                                    <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-blue-600 transition-colors">
                                        <a href="/news/{{ $news->slug }}">{{ $news->title }}</a>
                                    </h3>
                                    
                                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                        {{ Str::limit($news->excerpt, 150) }}
                                    </p>
                                    
                                    <a href="{{ route('news.show', $news->slug) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center transition-colors">
                                        Selengkapnya
                                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="bg-white rounded-xl shadow-md p-8 text-center border border-blue-100">
                            <i class="fas fa-newspaper text-gray-300 text-4xl mb-4"></i>
                            <p class="text-gray-500">Belum ada berita yang dipublikasikan.</p>
                            <a href="{{ route('news.index') }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm mt-2 inline-block">
                                Lihat Halaman Berita →
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Announcements -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-blue-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="w-1 h-6 bg-blue-600 rounded-full mr-3"></div>
                            <h3 class="text-xl font-bold text-gray-800">Pengumuman</h3>
                        </div>
                        <a href="{{ route('announcements.index') }}"" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center transition-colors">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </div>
                    
                    @forelse($activeAnnouncements as $announcement)
                        <div class="space-y-4">
                            <div class="p-4 rounded-lg border-l-4 
                                @if($announcement->type === 'urgent') border-red-500 bg-red-50
                                @elseif($announcement->type === 'warning') border-yellow-500 bg-yellow-50
                                @else border-blue-500 bg-blue-50 @endif 
                                hover:shadow-md transition-shadow cursor-pointer">
                                
                                <div class="flex items-center justify-between mb-2">
                                    <span class="px-2 py-1 rounded text-xs font-medium
                                        @if($announcement->type === 'urgent') bg-red-100 text-red-800
                                        @elseif($announcement->type === 'warning') bg-yellow-100 text-yellow-800
                                        @else bg-blue-100 text-blue-800 @endif">
                                        {{ ucfirst($announcement->type) }}
                                    </span>
                                    <span class="text-xs text-gray-500">
                                        {{ $announcement->start_date->format('d M') }}
                                    </span>
                                </div>
                                
                                <h4 class="font-semibold text-gray-800 text-sm mb-2 hover:text-blue-600">
                                    <a href="{{ route('announcements.show', $announcement->slug) }}">
                                        {{ Str::limit($announcement->title, 60) }}
                                    </a>
                                </h4>
                                
                                <p class="text-gray-600 text-xs">
                                    {{ Str::limit(strip_tags($announcement->content), 80) }}
                                </p>
                                
                                @if($announcement->end_date)
                                    <div class="mt-2 text-xs text-gray-500">
                                        <i class="fas fa-clock mr-1"></i>
                                        Sampai: {{ $announcement->end_date->format('d M Y') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-inbox text-gray-300 text-4xl mb-4"></i>
                            <p class="text-gray-500 text-sm">Tidak ada pengumuman aktif</p>
                        </div>
                    @endforelse
                    
                    @if($activeAnnouncements->count() > 0)
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('announcements.index') }}"" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors text-sm text-center block">
                                <i class="fas fa-megaphone mr-2"></i>
                                Lihat Semua Pengumuman
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Activity Schedule -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-blue-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="w-1 h-6 bg-blue-600 rounded-full mr-3"></div>
                            <h3 class="text-xl font-bold text-gray-800">Agenda Kegiatan</h3>
                        </div>
                        <a href="{{ route('events.index') }}"" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center transition-colors">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </div>
                    
                    <!-- Activity Items -->
                    @forelse($upcomingEvents as $index => $event)
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4 p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors cursor-pointer">
                                <div class="
                                    @if($index === 0) bg-blue-600
                                    @elseif($index === 1) bg-indigo-600
                                    @else bg-cyan-600 @endif 
                                    text-white rounded-lg p-2 text-center min-w-16">
                                    <div class="text-xs font-medium">{{ $event->event_date->format('M') }}</div>
                                    <div class="text-lg font-bold">{{ $event->event_date->format('d') }}</div>
                                    <div class="text-xs">{{ $event->event_date->format('Y') }}</div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-gray-800 text-sm mb-1 hover:text-blue-600">
                                        <a href="{{ route('events.index', $event->slug) }}">
                                            {{ Str::limit($event->title, 50) }}
                                        </a>
                                    </h4>
                                    <p class="text-gray-600 text-xs mb-2">
                                        <i class="fas fa-map-marker-alt mr-1"></i>{{ $event->location }}
                                    </p>
                                    @if($event->organizer)
                                        <p class="text-gray-600 text-xs mb-2">
                                            <i class="fas fa-user mr-1"></i>{{ $event->organizer }}
                                        </p>
                                    @endif
                                    <span class="text-xs px-2 py-1 rounded-full
                                        @if($event->status === 'scheduled') bg-yellow-100 text-yellow-800
                                        @elseif($event->status === 'ongoing') bg-blue-100 text-blue-800
                                        @elseif($event->status === 'completed') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ $event->status_badge }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-calendar-alt text-gray-300 text-4xl mb-4"></i>
                            <p class="text-gray-500 text-sm">Tidak ada agenda kegiatan mendatang</p>
                        </div>
                    @endforelse
                    
                    <!-- View All Button -->
                    @if($upcomingEvents->count() > 0)
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="{{ route('events.index') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors text-sm text-center block">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Lihat Semua Agenda
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Kegiatan & <span class="text-blue-600">Organisasi Desa</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Dokumentasi kegiatan dan struktur organisasi Desa Pokoh Kidul
            </p>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Left Column - Gallery -->
            <div class="lg:col-span-2">
                <!-- Gallery Header -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <div class="w-1 h-8 bg-blue-600 rounded-full mr-4"></div>
                        <h3 class="text-2xl font-bold text-gray-800">
                            Galeri <span class="text-blue-600">Foto & Video</span>
                        </h3>
                    </div>
                    <a href="{{ route('gallery.index') }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center transition-colors">
                        Lihat Semua
                        <i class="fas fa-chevron-right ml-2 text-xs"></i>
                    </a>
                </div>

                @if($featuredGallery && $featuredGallery->count() > 0)
                    <!-- Gallery Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        @foreach($featuredGallery as $index => $item)
                            @if($loop->first)
                                <!-- Large Featured Image -->
                                <a href="{{ route('gallery.show', $item) }}" class="md:col-span-2 group relative overflow-hidden rounded-xl shadow-lg bg-gradient-to-br from-blue-400 to-blue-600 h-64 hover:shadow-2xl transition-all duration-300">
                                    @if($item->media_url && $item->type === 'photo')
                                        <img src="{{ $item->media_url }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all duration-300"></div>
                                    @elseif($item->thumbnail_url && $item->type === 'video')
                                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                    @else
                                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all duration-300"></div>
                                    @endif
                                    
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center">
                                            @if($item->type === 'video')
                                                <i class="fas fa-play text-white text-5xl mb-4 opacity-80"></i>
                                            @else
                                                <i class="fas fa-camera text-white text-5xl mb-4 opacity-80"></i>
                                            @endif
                                            <h4 class="text-white font-bold text-xl mb-2">{{ $item->title }}</h4>
                                            @if($item->description)
                                                <p class="text-blue-100 text-sm">{{ Str::limit($item->description, 60) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                                            <i class="fas fa-{{ $item->type === 'video' ? 'video' : 'camera' }} mr-1"></i> 
                                            {{ ucfirst($item->type === 'video' ? 'Video' : 'Foto') }}
                                        </span>
                                    </div>
                                    @if($item->type === 'video')
                                        <div class="absolute bottom-4 right-4">
                                            <div class="bg-white bg-opacity-20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-opacity-30 transition-all">
                                                <i class="fas fa-play"></i>
                                            </div>
                                        </div>
                                    @endif
                                </a>
                            @else
                                <!-- Regular Gallery Items -->
                                @php
                                    $colors = [
                                        ['from-indigo-400', 'to-indigo-600', 'bg-indigo-600', 'text-indigo-100'],
                                        ['from-cyan-400', 'to-cyan-600', 'bg-cyan-600', 'text-cyan-100'],
                                        ['from-purple-400', 'to-purple-600', 'bg-purple-600', 'text-purple-100'],
                                        ['from-green-400', 'to-green-600', 'bg-green-600', 'text-green-100'],
                                        ['from-red-400', 'to-red-600', 'bg-red-600', 'text-red-100'],
                                        ['from-yellow-400', 'to-yellow-600', 'bg-yellow-600', 'text-yellow-100'],
                                    ];
                                    $colorSet = $colors[($index - 1) % count($colors)];
                                @endphp
                                
                                <a href="{{ route('gallery.show', $item) }}" class="group relative overflow-hidden rounded-xl shadow-lg bg-gradient-to-br {{ $colorSet[0] }} {{ $colorSet[1] }} h-48 hover:shadow-xl transition-all duration-300 cursor-pointer">
                                    @if($item->media_url && $item->type === 'photo')
                                        <img src="{{ $item->media_url }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all duration-300"></div>
                                    @elseif($item->thumbnail_url && $item->type === 'video')
                                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" class="absolute inset-0 w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                    @else
                                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all duration-300"></div>
                                    @endif
                                    
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-center">
                                            @if($item->type === 'video')
                                                <i class="fas fa-video text-white text-3xl mb-3 opacity-80"></i>
                                            @else
                                                <i class="fas fa-camera text-white text-3xl mb-3 opacity-80"></i>
                                            @endif
                                            <h4 class="text-white font-semibold text-lg mb-1">{{ Str::limit($item->title, 25) }}</h4>
                                            @if($item->description)
                                                <p class="{{ $colorSet[3] }} text-xs">{{ Str::limit($item->description, 40) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="absolute top-3 left-3">
                                        <span class="{{ $colorSet[2] }} text-white px-2 py-1 rounded-full text-xs">
                                            <i class="fas fa-{{ $item->type === 'video' ? 'video' : 'camera' }} mr-1"></i> 
                                            {{ ucfirst($item->type === 'video' ? 'Video' : 'Foto') }}
                                        </span>
                                    </div>
                                </a>
                            @endif
                        @endforeach

                    </div>

                    <!-- Gallery Stats -->
                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">{{ $galleryStats['total_photos'] ?? 0 }}+</div>
                            <div class="text-sm text-gray-600">Total Foto</div>
                        </div>
                        <div class="text-center p-4 bg-indigo-50 rounded-lg">
                            <div class="text-2xl font-bold text-indigo-600">{{ $galleryStats['total_videos'] ?? 0 }}+</div>
                            <div class="text-sm text-gray-600">Video Kegiatan</div>
                        </div>
                    </div>
                @else
                    <!-- Empty Gallery State -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2 group relative overflow-hidden rounded-xl shadow-lg bg-gradient-to-br from-gray-300 to-gray-400 h-64 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-images text-white text-5xl mb-4 opacity-80"></i>
                                <h4 class="text-white font-bold text-xl mb-2">Galeri Akan Segera Hadir</h4>
                                <p class="text-gray-100 text-sm">Dokumentasi kegiatan akan ditampilkan di sini</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">0</div>
                            <div class="text-sm text-gray-600">Total Foto</div>
                        </div>
                        <div class="text-center p-4 bg-indigo-50 rounded-lg">
                            <div class="text-2xl font-bold text-indigo-600">0</div>
                            <div class="text-sm text-gray-600">Video Kegiatan</div>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Right Column - Organization Structure -->
            <div class="lg:col-span-1">
                <!-- Organization Header -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <div class="w-1 h-8 bg-blue-600 rounded-full mr-4"></div>
                        <h3 class="text-2xl font-bold text-gray-800">
                            Struktur <span class="text-blue-600">Organisasi</span>
                        </h3>
                    </div>
                </div>

                @if($keyPositions && $keyPositions->count() > 0)
                    @php
                        $kepalaDesa = $keyPositions->where('position_name', 'Kepala Desa')->first();
                        $otherPositions = $keyPositions->where('position_name', '!=', 'Kepala Desa');
                    @endphp

                    @if($kepalaDesa)
                        <!-- Leadership Card -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 mb-6 border border-blue-200">
                            <div class="text-center">
                                <!-- Profile Photo -->
                                <div class="w-24 h-24 mx-auto mb-4 rounded-full {{ $kepalaDesa->photo_url ? '' : 'bg-gradient-to-br from-red-400 to-red-600' }} flex items-center justify-center shadow-lg overflow-hidden">
                                    @if($kepalaDesa->photo_url)
                                        <img src="{{ $kepalaDesa->photo_url }}" alt="{{ $kepalaDesa->person_name }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-user text-white text-2xl"></i>
                                    @endif
                                </div>
                                <h4 class="text-xl font-bold text-gray-800 mb-1">{{ $kepalaDesa->person_name ?: 'Belum Diisi' }}</h4>
                                <p class="text-blue-600 font-semibold mb-3">{{ strtoupper($kepalaDesa->position_name) }}</p>
                                
                                <!-- Action Buttons -->
                                <div class="flex space-x-1 mt-4">
                                    <a href="{{ route('organization.show', $kepalaDesa) }}" class="flex-1 bg-white hover:bg-gray-50 text-blue-600 text-xs font-medium py-2 px-3 rounded-lg border border-blue-200 transition-colors">
                                        <i class="fas fa-info-circle mr-1"></i> Profil
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Quick Structure -->
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Perangkat Desa</h4>
                        
                        <div class="space-y-3">
                            @foreach($otherPositions->take(4) as $position)
                                @php
                                    $icons = [
                                        'Sekretaris Desa' => ['icon' => 'fa-user-tie', 'color' => 'blue'],
                                        'Bendahara Desa' => ['icon' => 'fa-calculator', 'color' => 'green'],
                                        'Kepala Urusan Pemerintahan' => ['icon' => 'fa-users', 'color' => 'purple'],
                                        'Kepala Urusan Kesejahteraan' => ['icon' => 'fa-heart', 'color' => 'red'],
                                        'Kepala Dusun I' => ['icon' => 'fa-home', 'color' => 'orange'],
                                    ];
                                    $iconData = $icons[$position->position_name] ?? ['icon' => 'fa-user', 'color' => 'gray'];
                                @endphp
                                
                                <a href="{{ route('organization.show', $position) }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors cursor-pointer">
                                    <div class="w-8 h-8 bg-{{ $iconData['color'] }}-100 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas {{ $iconData['icon'] }} text-{{ $iconData['color'] }}-600 text-xs"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="text-sm font-semibold text-gray-800">{{ $position->position_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $position->person_name ?: 'Belum Diisi' }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!-- View Full Structure Button -->
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="{{ route('organization.index') }}" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition-all duration-300 text-sm block text-center">
                                <i class="fas fa-sitemap mr-2"></i>
                                Lihat Struktur Lengkap
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Empty Organization State -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 mb-6 border border-blue-200">
                        <div class="text-center">
                            <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gray-300 flex items-center justify-center shadow-lg">
                                <i class="fas fa-user text-gray-500 text-2xl"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-800 mb-1">Belum Ada Data</h4>
                            <p class="text-blue-600 font-semibold mb-3">KEPALA DESA</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
                        <h4 class="font-bold text-gray-800 mb-4">Perangkat Desa</h4>
                        <div class="text-center py-8">
                            <i class="fas fa-users text-gray-300 text-3xl mb-4"></i>
                            <p class="text-gray-500 text-sm">Data perangkat desa akan ditampilkan di sini</p>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-100">
                            <a href="{{ route('organization.index') }}" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition-all duration-300 text-sm block text-center">
                                <i class="fas fa-sitemap mr-2"></i>
                                Lihat Struktur Lengkap
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


<section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <!-- Section Header -->
    <div class="text-center mb-12">
        <div class="flex items-center justify-center mb-4">
            <i class="fas fa-map-marker-alt text-emerald-600 text-3xl mr-3"></i>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Lokasi & Wilayah</h2>
        </div>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Mengenal lebih dekat letak geografis dan batas wilayah Desa Pokoh Kidul
        </p>
    </div>

    <!-- Main Content Grid -->
    <div class="grid lg:grid-cols-3 gap-8 mb-12">
        <!-- Left - Identitas Desa -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 h-full">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-id-card text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Identitas Desa</h3>
                </div>
                <div class="space-y-6">
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 mb-1">Kode PUM</span>
                        <span class="text-lg font-semibold text-gray-900">3312122004</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 mb-1">Luas Wilayah</span>
                        <span class="text-lg font-semibold text-emerald-600">1.346,19 Ha</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 mb-1">Tahun Pembentukan</span>
                        <span class="text-lg font-semibold text-gray-900">-</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-500 mb-1">Dasar Hukum</span>
                        <span class="text-lg font-semibold text-gray-900">-</span>
                    </div>
                </div>

                <!-- Area Stats -->
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl p-6 text-white mt-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-emerald-100 text-sm font-medium">Total Luas</p>
                            <p class="text-2xl font-bold mt-1">1.346,19</p>
                            <p class="text-emerald-100">Hektare</p>
                        </div>
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-area text-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Center - Google Maps -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 h-full">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-map-marked-alt text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900">Lokasi Desa</h3>
                            <p class="text-gray-600 text-sm">Desa Pokoh Kidul, Wonogiri</p>
                        </div>
                    </div>
                    <button onclick="openFullMap()" class="text-emerald-600 hover:text-emerald-700 transition-colors">
                        <i class="fas fa-expand-alt"></i>
                    </button>
                </div>
                <!-- Google Maps Embed -->
                <div class="relative rounded-xl overflow-hidden shadow-inner" style="height: 400px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63455.89123456789!2d110.8234567!3d-7.8123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1234567890ab%3A0x1234567890abcdef!2sPokoh%20Kidul%2C%20Wonogiri%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <!-- Overlay for better UX -->
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2 text-sm font-medium text-gray-700">
                        📍 Desa Pokoh Kidul
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Custom JavaScript untuk homepage
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll untuk internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Tambahkan kelas animasi setelah DOM loaded
        const animateElements = document.querySelectorAll('.animate-fade-in-left, .animate-fade-in-right, .animate-fade-in-up');
        animateElements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = el.classList.contains('animate-fade-in-left') ? 'translateX(-100px)' : 
                                el.classList.contains('animate-fade-in-right') ? 'translateX(100px)' : 
                                'translateY(30px)';
            
            setTimeout(() => {
                el.style.transition = 'all 0.8s ease-out';
                el.style.opacity = '1';
                el.style.transform = 'translate(0)';
            }, index * 200);
        });
    });
    // Add subtle animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all cards
    document.querySelectorAll('.bg-white, .bg-gradient-to-r').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Function to open full map
    function openFullMap() {
        const mapUrl = 'https://www.google.com/maps/place/Pokoh+Kidul,+Wonogiri,+Central+Java/@-7.8123456,110.8234567,15z';
        window.open(mapUrl, '_blank');
    }
</script>
@endpush