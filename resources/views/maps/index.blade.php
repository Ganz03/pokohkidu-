@extends('layouts.app')

@section('title', 'Peta & Infografis - Desa Pokohkidul')

@push('styles')
<style>
    .map-card {
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }
    
    .map-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        border-color: #3b82f6;
    }
    
    .map-image {
        height: 250px;
        object-fit: cover;
        object-position: center;
    }
    
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .zoom-overlay {
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(8px);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Peta & <span class="text-yellow-300">Infografis</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Kumpulan peta wilayah dan infografis tentang Desa Pokohkidul
            </p>
        </div>

        <!-- Search & Filter -->
        <div class="max-w-4xl mx-auto">
            <form method="GET" class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Search Input -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-blue-100 mb-2">Cari Peta</label>
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari berdasarkan judul atau deskripsi..."
                               class="w-full px-4 py-3 bg-white/90 border border-white/30 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    
                    <!-- Year Filter -->
                    <div>
                        <label class="block text-sm font-medium text-blue-100 mb-2">Tahun</label>
                        <select name="year" 
                                class="w-full px-4 py-3 bg-white/90 border border-white/30 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="">Semua Tahun</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-2 mt-4">
                    <button type="submit" 
                            class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-6 py-2 rounded-lg transition-colors">
                        <i class="fas fa-search mr-2"></i>Cari
                    </button>
                    <a href="{{ route('maps.index') }}" 
                       class="bg-white/20 hover:bg-white/30 text-white font-semibold px-6 py-2 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Reset
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Latest Maps Section -->
@if($latestMaps->count() > 0 && !request()->filled('search') && !request()->filled('year'))
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Peta Terbaru</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestMaps as $latest)
                <div class="map-card bg-white rounded-xl overflow-hidden">
                    <div class="relative">
                        <img src="{{ $latest->image_url }}" 
                             alt="{{ $latest->title }}" 
                             class="w-full map-image cursor-pointer"
                             onclick="openImageModal('{{ $latest->image_url }}', '{{ $latest->title }}')">
                        <div class="absolute top-3 left-3">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                                <i class="fas fa-clock mr-1"></i>Terbaru
                            </span>
                        </div>
                        @if($latest->year)
                            <div class="absolute top-3 right-3">
                                <span class="bg-green-600 text-white px-2 py-1 rounded-full text-xs">
                                    {{ $latest->year }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
                            <a href="{{ route('maps.show', $latest->slug) }}">{{ $latest->title }}</a>
                        </h3>
                        @if($latest->description)
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($latest->description, 120) }}</p>
                        @endif
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <span><i class="fas fa-eye mr-1"></i>{{ number_format($latest->views) }} views</span>
                            <a href="{{ route('maps.show', $latest->slug) }}" 
                               class="text-blue-600 hover:text-blue-700 font-medium">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Maps Grid Section -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Results Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    @if(request()->filled('search') || request()->filled('year'))
                        Hasil Pencarian
                    @else
                        Semua Peta & Infografis
                    @endif
                </h2>
                <p class="text-gray-600 mt-1">
                    Menampilkan {{ $maps->firstItem() ?? 0 }}-{{ $maps->lastItem() ?? 0 }} dari {{ $maps->total() }} peta
                </p>
            </div>
        </div>

        @if($maps->count() > 0)
            <!-- Maps Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($maps as $map)
                    <div class="map-card bg-white rounded-xl overflow-hidden">
                        <div class="relative group">
                            <img src="{{ $map->image_url }}" 
                                 alt="{{ $map->title }}" 
                                 class="w-full map-image cursor-pointer"
                                 onclick="openImageModal('{{ $map->image_url }}', '{{ $map->title }}')">
                            
                            <!-- Overlay on hover -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                <button onclick="openImageModal('{{ $map->image_url }}', '{{ $map->title }}')"
                                        class="bg-white text-gray-900 px-4 py-2 rounded-lg font-medium opacity-0 group-hover:opacity-100 transform scale-90 group-hover:scale-100 transition-all duration-300">
                                    <i class="fas fa-search-plus mr-2"></i>Lihat Detail
                                </button>
                            </div>
                            
                            @if($map->year)
                                <div class="absolute top-3 right-3">
                                    <span class="bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-medium">
                                        {{ $map->year }}
                                    </span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 hover:text-blue-600 transition-colors line-clamp-2">
                                <a href="{{ route('maps.show', $map->slug) }}">{{ $map->title }}</a>
                            </h3>
                            
                            @if($map->description)
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ Str::limit($map->description, 100) }}</p>
                            @endif
                            
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <span><i class="fas fa-eye mr-1"></i>{{ number_format($map->views) }}</span>
                                <span><i class="fas fa-calendar mr-1"></i>{{ $map->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($maps->hasPages())
                <div class="mt-12">
                    {{ $maps->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-map-marked-alt text-gray-300 text-6xl mb-6"></i>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Tidak Ada Peta Ditemukan</h3>
                    <p class="text-gray-600 mb-6">
                        @if(request()->filled('search') || request()->filled('year'))
                            Tidak ada peta yang sesuai dengan kriteria pencarian Anda.
                        @else
                            Belum ada peta yang dipublikasikan.
                        @endif
                    </p>
                    @if(request()->filled('search') || request()->filled('year'))
                        <a href="{{ route('maps.index') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors">
                            Lihat Semua Peta
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 zoom-overlay hidden z-50 flex items-center justify-center p-4">
    <div class="relative max-w-6xl max-h-full">
        <button onclick="closeImageModal()" 
                class="absolute -top-12 right-0 text-white hover:text-gray-300 text-2xl">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-75 text-white p-4 rounded-b-lg">
            <h4 id="modalTitle" class="text-lg font-semibold"></h4>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openImageModal(imageUrl, title) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        
        modalImage.src = imageUrl;
        modalImage.alt = title;
        modalTitle.textContent = title;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    // Close modal when clicking outside or pressing Escape
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) closeImageModal();
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeImageModal();
    });
</script>
@endpush