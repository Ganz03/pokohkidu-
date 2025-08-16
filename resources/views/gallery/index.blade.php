{{-- resources/views/gallery/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Galeri <span class="text-blue-600">Kegiatan</span>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Dokumentasi kegiatan dan program Desa Pokoh Kidul
            </p>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>

        @if($galleryItems && $galleryItems->count() > 0)
            <!-- Filter Tabs -->
            <div class="flex justify-center mb-8">
                <div class="flex space-x-1 bg-gray-100 p-1 rounded-lg">
                    <a href="{{ route('gallery.index') }}" 
                       class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ !request('type') ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-blue-600' }}">
                        Semua
                    </a>
                    <a href="{{ route('gallery.index', ['type' => 'photo']) }}" 
                       class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request('type') === 'photo' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-blue-600' }}">
                        Foto
                    </a>
                    <a href="{{ route('gallery.index', ['type' => 'video']) }}" 
                       class="px-4 py-2 rounded-md text-sm font-medium transition-colors {{ request('type') === 'video' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-600 hover:text-blue-600' }}">
                        Video
                    </a>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($galleryItems as $item)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg bg-white hover:shadow-2xl transition-all duration-300">
                        <div class="aspect-w-16 aspect-h-9 bg-gray-200">
                            @if($item->type === 'video')
                                <div class="relative">
                                    @if($item->thumbnail_url)
                                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center">
                                            <i class="fas fa-video text-white text-4xl opacity-80"></i>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                        <div class="bg-white bg-opacity-20 backdrop-blur-sm p-3 rounded-full">
                                            <i class="fas fa-play text-white text-xl"></i>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if($item->media_url)
                                    <img src="{{ $item->media_url }}" alt="{{ $item->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <i class="fas fa-image text-white text-4xl opacity-80"></i>
                                    </div>
                                @endif
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->type === 'video' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                    <i class="fas {{ $item->type === 'video' ? 'fa-video' : 'fa-camera' }} mr-1"></i>
                                    {{ ucfirst($item->type === 'video' ? 'Video' : 'Foto') }}
                                </span>
                            </div>
                            
                            <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2">{{ $item->title }}</h3>
                            
                            @if($item->description)
                                <p class="text-gray-600 text-sm line-clamp-2">{{ $item->description }}</p>
                            @endif
                            
                            <div class="mt-4">
                                <a href="{{ route('gallery.show', $item) }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium text-sm">
                                    Lihat Detail
                                    <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($galleryItems->hasPages())
                <div class="flex justify-center">
                    {{ $galleryItems->links() }}
                </div>
            @endif

            <!-- Gallery Stats -->
            <div class="mt-12 grid grid-cols-2 gap-4 max-w-md mx-auto">
                <div class="text-center p-4 bg-blue-50 rounded-lg">
                    <div class="text-2xl font-bold text-blue-600">{{ $stats['total_photos'] ?? 0 }}+</div>
                    <div class="text-sm text-gray-600">Total Foto</div>
                </div>
                <div class="text-center p-4 bg-indigo-50 rounded-lg">
                    <div class="text-2xl font-bold text-indigo-600">{{ $stats['total_videos'] ?? 0 }}+</div>
                    <div class="text-sm text-gray-600">Video Kegiatan</div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-images text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Galeri</h3>
                    <p class="text-gray-600 mb-6">Galeri kegiatan akan ditampilkan di sini setelah ditambahkan oleh administrator.</p>
                    <a href="{{ route('welcome') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection