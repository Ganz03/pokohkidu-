@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <article class="bg-white rounded-xl shadow-md overflow-hidden">
            
            {{-- Featured Image --}}
            @if($event->image)
                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="w-full h-64 md:h-96 object-cover">
            @endif

            <div class="p-8">
                {{-- Event Info Header --}}
                <div class="grid md:grid-cols-4 gap-6 mb-8 p-6 bg-gray-50 rounded-xl">
                    
                    {{-- Date Card --}}
                    <div class="text-center">
                        <div class="bg-blue-600 text-white rounded-lg p-4 mx-auto w-20">
                            <div class="text-xs font-medium">{{ $event->event_date->format('M') }}</div>
                            <div class="text-2xl font-bold">{{ $event->event_date->format('d') }}</div>
                            <div class="text-xs">{{ $event->event_date->format('Y') }}</div>
                        </div>
                        <div class="mt-2 text-sm text-gray-600">
                            {{ $event->event_date->format('H:i') }}
                            @if($event->end_date)
                                <br>s/d {{ $event->end_date->format('H:i') }}
                            @endif
                        </div>
                    </div>
                    
                    {{-- Location --}}
                    <div class="text-center md:text-left">
                        <div class="text-gray-500 text-sm mb-1">
                            <i class="fas fa-map-marker-alt"></i> Lokasi
                        </div>
                        <div class="font-semibold text-gray-800">{{ $event->location }}</div>
                    </div>
                    
                    {{-- Organizer --}}
                    @if($event->organizer)
                    <div class="text-center md:text-left">
                        <div class="text-gray-500 text-sm mb-1">
                            <i class="fas fa-user"></i> Penyelenggara
                        </div>
                        <div class="font-semibold text-gray-800">{{ $event->organizer }}</div>
                    </div>
                    @endif
                    
                    {{-- Status --}}
                    <div class="text-center md:text-left">
                        <div class="text-gray-500 text-sm mb-1">
                            <i class="fas fa-flag"></i> Status
                        </div>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                            @if($event->status === 'scheduled') bg-yellow-100 text-yellow-800
                            @elseif($event->status === 'ongoing') bg-blue-100 text-blue-800
                            @elseif($event->status === 'completed') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            @if($event->status === 'scheduled') 
                                <i class="fas fa-clock mr-1"></i>{{ $event->status_badge }}
                            @elseif($event->status === 'ongoing') 
                                <i class="fas fa-play mr-1"></i>{{ $event->status_badge }}
                            @elseif($event->status === 'completed') 
                                <i class="fas fa-check mr-1"></i>{{ $event->status_badge }}
                            @else 
                                <i class="fas fa-times mr-1"></i>{{ $event->status_badge }}
                            @endif
                        </span>
                    </div>
                    
                </div>

                {{-- Views Counter --}}
                <div class="text-right text-sm text-gray-500 mb-4">
                    <i class="fas fa-eye mr-1"></i>{{ $event->views }} views
                </div>

                {{-- Title --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">{{ $event->title }}</h1>

                {{-- Description --}}
                <div class="text-lg text-gray-600 mb-6 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                    {{ $event->description }}
                </div>

                {{-- Content --}}
                @if($event->content)
                <div class="prose prose-lg max-w-none mb-8">
                    {!! $event->content !!}
                </div>
                @endif

                {{-- Event Time Info --}}
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                        <h3 class="font-bold text-yellow-800 mb-2">
                            <i class="fas fa-calendar-alt mr-2"></i>Waktu Pelaksanaan
                        </h3>
                        <div class="text-yellow-700">
                            <div><strong>Mulai:</strong> {{ $event->event_date->format('l, d F Y') }} pukul {{ $event->event_date->format('H:i') }}</div>
                            @if($event->end_date)
                                <div><strong>Selesai:</strong> {{ $event->end_date->format('l, d F Y') }} pukul {{ $event->end_date->format('H:i') }}</div>
                                <div class="mt-2 text-sm">
                                    @php
                                        $duration = $event->event_date->diffInHours($event->end_date);
                                        $days = $event->event_date->diffInDays($event->end_date);
                                    @endphp
                                    <strong>Durasi:</strong> 
                                    @if($days > 0)
                                        {{ $days }} hari {{ $duration % 24 }} jam
                                    @else
                                        {{ $duration }} jam
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="p-4 bg-green-50 rounded-lg border border-green-200">
                        <h3 class="font-bold text-green-800 mb-2">
                            <i class="fas fa-map-marked-alt mr-2"></i>Informasi Lokasi
                        </h3>
                        <div class="text-green-700">
                            <div><strong>Tempat:</strong> {{ $event->location }}</div>
                            @if($event->organizer)
                                <div><strong>Diselenggarakan oleh:</strong> {{ $event->organizer }}</div>
                            @endif
                            <div class="mt-2">
                                <a href="https://maps.google.com/?q={{ urlencode($event->location . ', Pokoh Kidul, Wonogiri') }}" 
                                   target="_blank" 
                                   class="inline-flex items-center text-green-600 hover:text-green-700 text-sm">
                                    <i class="fas fa-external-link-alt mr-1"></i>Lihat di Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Countdown Timer untuk upcoming events --}}
                @if($event->status === 'scheduled' && $event->event_date->isFuture())
                <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl mb-8">
                    <h3 class="font-bold text-lg mb-4 text-center">
                        <i class="fas fa-hourglass-half mr-2"></i>Hitung Mundur
                    </h3>
                    <div id="countdown" class="text-center">
                        <div class="grid grid-cols-4 gap-4 text-center">
                            <div>
                                <div id="days" class="text-3xl font-bold">-</div>
                                <div class="text-sm opacity-80">Hari</div>
                            </div>
                            <div>
                                <div id="hours" class="text-3xl font-bold">-</div>
                                <div class="text-sm opacity-80">Jam</div>
                            </div>
                            <div>
                                <div id="minutes" class="text-3xl font-bold">-</div>
                                <div class="text-sm opacity-80">Menit</div>
                            </div>
                            <div>
                                <div id="seconds" class="text-3xl font-bold">-</div>
                                <div class="text-sm opacity-80">Detik</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Share & Back --}}
                <div class="flex justify-between items-center mt-8 pt-8 border-t">
                    <a href="{{ route('events.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Agenda
                    </a>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">Bagikan:</span>
                        <div class="flex space-x-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                               class="text-blue-600 hover:text-blue-700 p-2 rounded-full hover:bg-blue-50"
                               target="_blank">
                                <i class="fab fa-facebook text-lg"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $event->title }}" 
                               class="text-blue-400 hover:text-blue-500 p-2 rounded-full hover:bg-blue-50"
                               target="_blank">
                                <i class="fab fa-twitter text-lg"></i>
                            </a>
                            <a href="https://wa.me/?text={{ $event->title }} {{ url()->current() }}" 
                               class="text-green-600 hover:text-green-700 p-2 rounded-full hover:bg-green-50"
                               target="_blank">
                                <i class="fab fa-whatsapp text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        {{-- Related Events --}}
        @if($related->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                <i class="fas fa-calendar-alt mr-2"></i>Kegiatan Terkait
            </h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($related as $item)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($item->image)
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-32 object-cover">
                    @else
                        <div class="w-full h-32 bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center">
                            <i class="fas fa-calendar text-white text-2xl"></i>
                        </div>
                    @endif
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-xs text-gray-500">{{ $item->event_date->format('d M Y') }}</div>
                            <span class="px-2 py-1 rounded text-xs font-medium
                                @if($item->status === 'scheduled') bg-yellow-100 text-yellow-800
                                @elseif($item->status === 'ongoing') bg-blue-100 text-blue-800
                                @elseif($item->status === 'completed') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ $item->status_badge }}
                            </span>
                        </div>
                        <h3 class="font-bold text-sm mb-2 hover:text-blue-600">
                            <a href="{{ route('events.show', $item->slug) }}">{{ Str::limit($item->title, 60) }}</a>
                        </h3>
                        <p class="text-gray-600 text-xs mb-2">{{ Str::limit($item->description, 80) }}</p>
                        <div class="text-xs text-gray-500 mb-2">
                            <i class="fas fa-map-marker-alt mr-1"></i>{{ Str::limit($item->location, 25) }}
                        </div>
                        <a href="{{ route('events.show', $item->slug) }}" class="text-blue-600 hover:text-blue-700 text-xs font-medium">
                            Lihat Detail →
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

{{-- Countdown Script untuk upcoming events --}}
@if($event->status === 'scheduled' && $event->event_date->isFuture())
<script>
document.addEventListener('DOMContentLoaded', function() {
    const eventDate = new Date('{{ $event->event_date->toISOString() }}').getTime();
    
    function updateCountdown() {
        const now = new Date().getTime();
        const distance = eventDate - now;
        
        if (distance < 0) {
            document.getElementById('countdown').innerHTML = '<div class="text-lg">Acara sudah dimulai!</div>';
            return;
        }
        
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        document.getElementById('days').textContent = days;
        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;
    }
    
    updateCountdown();
    setInterval(updateCountdown, 1000);
});
</script>
@endif
@endsection