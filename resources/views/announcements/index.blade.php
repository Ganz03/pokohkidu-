@extends('layouts.app')

@section('title', 'Pengumuman Desa Pokoh Kidul')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Pengumuman <span class="text-blue-600">Desa Pokoh Kidul</span>
            </h1>
            <p class="text-lg text-gray-600">
                Informasi penting dan pengumuman resmi dari pemerintah desa
            </p>
        </div>

        {{-- Announcements List --}}
        <div class="space-y-6">
            @forelse($announcements as $announcement)
            <article class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow border-l-4 
                @if($announcement->type === 'urgent') border-red-500
                @elseif($announcement->type === 'warning') border-yellow-500
                @else border-blue-500 @endif">
                
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center space-x-3">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            @if($announcement->type === 'urgent') bg-red-100 text-red-800
                            @elseif($announcement->type === 'warning') bg-yellow-100 text-yellow-800
                            @else bg-blue-100 text-blue-800 @endif">
                            {{ ucfirst($announcement->type) }}
                        </span>
                        <span class="text-sm text-gray-500">{{ $announcement->created_at->format('d M Y') }}</span>
                    </div>
                    <span class="text-xs text-gray-400">{{ $announcement->views }} views</span>
                </div>

                <h2 class="text-xl font-bold text-gray-800 mb-3 hover:text-blue-600">
                    <a href="{{ route('announcements.show', $announcement->slug) }}">{{ $announcement->title }}</a>
                </h2>
                
                <div class="text-gray-600 mb-4">
                    {!! Str::limit(strip_tags($announcement->content), 200) !!}
                </div>
                
                <div class="flex justify-between items-center">
                    <a href="{{ route('announcements.show', $announcement->slug) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Baca Selengkapnya →
                    </a>
                    @if($announcement->end_date)
                        <span class="text-xs text-gray-500">Berlaku sampai: {{ $announcement->end_date->format('d M Y') }}</span>
                    @endif
                </div>
            </article>
            @empty
            <div class="text-center py-12">
                <i class="fas fa-megaphone text-gray-300 text-6xl mb-4"></i>
                <p class="text-gray-500">Belum ada pengumuman yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $announcements->links() }}
        </div>
    </div>
</div>
@endsection