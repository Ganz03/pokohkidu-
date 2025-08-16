@extends('layouts.app')

@section('title', 'Agenda Kegiatan Desa Pokoh Kidul')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Agenda <span class="text-blue-600">Kegiatan Desa</span>
            </h1>
            <p class="text-lg text-gray-600">
                Jadwal kegiatan dan acara di Desa Pokoh Kidul
            </p>
        </div>

        {{-- Upcoming Events --}}
        @if($upcoming->count() > 0)
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Kegiatan Mendatang</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcoming as $event)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($event->image)
                        <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                            <i class="fas fa-calendar text-white text-4xl"></i>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-blue-600 text-white rounded-lg p-2 text-center min-w-16">
                                <div class="text-xs font-medium">{{ $event->event_date->format('M') }}</div>
                                <div class="text-lg font-bold">{{ $event->event_date->format('d') }}</div>
                                <div class="text-xs">{{ $event->event_date->format('Y') }}</div>
                            </div>
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">
                                {{ $event->status_badge }}
                            </span>
                        </div>
                        
                        <h3 class="font-bold text-lg mb-2 hover:text-blue-600">
                            <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($event->description, 100) }}</p>
                        
                        <div class="text-xs text-gray-500 mb-4">
                            <div><i class="fas fa-map-marker-alt mr-1"></i> {{ $event->location }}</div>
                            @if($event->organizer)
                                <div class="mt-1"><i class="fas fa-user mr-1"></i> {{ $event->organizer }}</div>
                            @endif
                        </div>
                        
                        <a href="{{ route('events.show', $event->slug) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                            Lihat Detail →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Completed Events --}}
        @if($completed->count() > 0)
        <div>
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Kegiatan Selesai</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($completed as $event)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow opacity-75">
                    @if($event->image)
                        <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center">
                            <i class="fas fa-calendar text-white text-4xl"></i>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-gray-600 text-white rounded-lg p-2 text-center min-w-16">
                                <div class="text-xs font-medium">{{ $event->event_date->format('M') }}</div>
                                <div class="text-lg font-bold">{{ $event->event_date->format('d') }}</div>
                                <div class="text-xs">{{ $event->event_date->format('Y') }}</div>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                {{ $event->status_badge }}
                            </span>
                        </div>
                        
                        <h3 class="font-bold text-lg mb-2 hover:text-blue-600">
                            <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-3">{{ Str::limit($event->description, 100) }}</p>
                        
                        <div class="text-xs text-gray-500 mb-4">
                            <div><i class="fas fa-map-marker-alt mr-1"></i> {{ $event->location }}</div>
                            <div class="mt-1">{{ $event->views }} views</div>
                        </div>
                        
                        <a href="{{ route('events.show', $event->slug) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                            Lihat Detail →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

        @if($upcoming->count() === 0 && $completed->count() === 0)
        <div class="text-center py-12">
            <i class="fas fa-calendar-alt text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500">Belum ada agenda kegiatan yang tersedia.</p>
        </div>
        @endif

    </div>
</div>
@endsection