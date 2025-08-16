@extends('layouts.app')

@section('title', $map->title . ' - Peta & Infografis Desa Pokohkidul')

@push('styles')
<style>
    .map-detail-image {
        max-height: 80vh;
        object-fit: contain;
        cursor: zoom-in;
    }
    
    .zoom-overlay {
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(8px);
    }
    
    .share-button {
        transition: all 0.2s ease;
    }
    
    .share-button:hover {
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
<!-- Breadcrumb -->
<nav class="bg-gray-50 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-2 text-sm">
            <a href="{{ route('maps.index') }}" class="text-blue-600 hover:text-blue-800">Peta & Infografis</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-900">{{ $map->title }}</span>
        </div>
    </div>
</nav>

<!-- Main Content -->
<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Map Header -->
                <div class="mb-6">
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        @if($map->year)
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                <i class="fas fa-calendar mr-1"></i>{{ $map->year }}
                            </span>
                        @endif
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $map->title }}</h1>
                    
                    <div class="flex items-center text-sm text-gray-600 space-x-4">
                        <span><i class="fas fa-eye mr-1"></i>{{ number_format($map->views) }} views</span>
                        <span><i class="fas fa-calendar mr-1"></i>Dibuat {{ $map->created_at->format('d M Y') }}</span>
                        @if($map->updated_at != $map->created_at)
                            <span><i class="fas fa-edit mr-1"></i>Update {{ $map->updated_at->format('d M Y') }}</span>
                        @endif
                    </div>
                </div>

                <!-- Map Image -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                    <div class="relative">
                        <img src="{{ $map->image_url }}" 
                             alt="{{ $map->title }}" 
                             class="w-full map-detail-image"
                             onclick="openImageModal('{{ $map->image_url }}', '{{ $map->title }}')">
                        <div class="absolute bottom-4 right-4">
                            <button onclick="openImageModal('{{ $map->image_url }}', '{{ $map->title }}')"
                                    class="bg-black bg-opacity-50 hover:bg-opacity-70 text-white px-4 py-2 rounded-lg transition-all">
                                <i class="fas fa-expand mr-2"></i>Perbesar
                            </button>
                        </div>
                    </div>
                    
                    @if($map->description)
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi</h3>
                            <div class="prose prose-gray max-w-none text-gray-700">
                                {{ $map->description }}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Share Section -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Bagikan Peta Ini</h3>
                    <div class="flex flex-wrap gap-3">
                        <button onclick="shareToFacebook()" 
                                class="share-button bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                            <i class="fab fa-facebook-f mr-2"></i>Facebook
                        </button>
                        <button onclick="shareToTwitter()" 
                                class="share-button bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </button>
                        <button onclick="shareToWhatsApp()" 
                                class="share-button bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                        </button>
                        <button onclick="copyLink()" 
                                class="share-button bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                            <i class="fas fa-link mr-2"></i>Salin Link
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Download Section -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Download Peta</h3>
                    <p class="text-gray-600 text-sm mb-4">Unduh peta dalam resolusi tinggi untuk keperluan Anda.</p>
                    <a href="{{ $map->image_url }}" 
                       download="{{ $map->title }}.jpg"
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors text-center block">
                        <i class="fas fa-download mr-2"></i>Download Gambar
                    </a>
                </div>

                <!-- Map Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Peta</h3>
                    <div class="space-y-3">
                        @if($map->year)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tahun:</span>
                                <span class="font-medium">{{ $map->year }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between">
                            <span class="text-gray-600">Views:</span>
                            <span class="font-medium">{{ number_format($map->views) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dipublikasi:</span>
                            <span class="font-medium">{{ $map->created_at->format('d M Y') }}</span>
                        </div>
                        @if($map->updated_at != $map->created_at)
                            <div class="flex justify-between">
                                <span class="text-gray-600">Terakhir Update:</span>
                                <span class="font-medium">{{ $map->updated_at->format('d M Y') }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recent Maps -->
                @if($recentMaps->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Peta Lainnya</h3>
                        <div class="space-y-4">
                            @foreach($recentMaps as $recent)
                                <a href="{{ route('maps.show', $recent->slug) }}" 
                                   class="block group">
                                    <div class="flex space-x-3">
                                        <img src="{{ $recent->image_url }}" 
                                             alt="{{ $recent->title }}" 
                                             class="w-16 h-16 object-cover rounded-lg">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-medium text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2">
                                                {{ $recent->title }}
                                            </h4>
                                            <p class="text-xs text-gray-600 mt-1">
                                                <i class="fas fa-eye mr-1"></i>{{ number_format($recent->views) }} views
                                                @if($recent->year)
                                                    • {{ $recent->year }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <a href="{{ route('maps.index') }}" 
                               class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                Lihat semua peta →
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 zoom-overlay hidden z-50 flex items-center justify-center p-4">
    <div class="relative max-w-7xl max-h-full">
        <button onclick="closeImageModal()" 
                class="absolute -top-12 right-0 text-white hover:text-gray-300 text-2xl z-10">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-[95vh] object-contain rounded-lg shadow-2xl">
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openImageModal(imageUrl, title) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        
        modalImage.src = imageUrl;
        modalImage.alt = title;
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
    
    // Share functions
    function shareToFacebook() {
        const url = encodeURIComponent(window.location.href);
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
    }
    
    function shareToTwitter() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent('{{ $map->title }} - Peta & Infografis Desa Pokohkidul');
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
    }
    
    function shareToWhatsApp() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent('{{ $map->title }} - Lihat peta ini: ');
        window.open(`https://wa.me/?text=${text}${url}`, '_blank');
    }
    
    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const button = event.target.closest('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check mr-2"></i>Tersalin!';
            button.classList.remove('bg-gray-600', 'hover:bg-gray-700');
            button.classList.add('bg-green-600');
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600');
                button.classList.add('bg-gray-600', 'hover:bg-gray-700');
            }, 2000);
        });
    }
</script>
@endpush