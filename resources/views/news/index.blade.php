@extends('layouts.app')

@section('title', 'Berita Desa Pokoh Kidul')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Berita <span class="text-blue-600">Desa Pokoh Kidul</span>
            </h1>
            <p class="text-lg text-gray-600">
                Informasi terkini seputar kegiatan dan perkembangan desa
            </p>
        </div>

        {{-- Featured News --}}
        @if($featured->count() > 0)
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Berita Utama</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($featured as $item)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($item->image)
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <i class="fas fa-newspaper text-white text-4xl"></i>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="text-xs text-blue-600 mb-2">{{ $item->published_at->format('d M Y') }}</div>
                        <h3 class="font-bold text-lg mb-3 hover:text-blue-600">
                            <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $item->excerpt }}</p>
                        <a href="{{ route('news.show', $item->slug) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

        {{-- All News --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($news as $item)
            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center">
                        <i class="fas fa-newspaper text-white text-4xl"></i>
                    </div>
                @endif
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs text-gray-500 mb-2">
                        <span>{{ $item->published_at->format('d M Y') }}</span>
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">{{ $item->category }}</span>
                    </div>
                    <h3 class="font-bold text-lg mb-3 hover:text-blue-600">
                        <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->excerpt, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('news.show', $item->slug) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                            Baca Selengkapnya →
                        </a>
                        <span class="text-xs text-gray-400">{{ $item->views }} views</span>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-12">
                <i class="fas fa-newspaper text-gray-300 text-6xl mb-4"></i>
                <p class="text-gray-500">Belum ada berita yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection