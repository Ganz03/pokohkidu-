@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <article class="bg-white rounded-xl shadow-md overflow-hidden border-l-4
            @if($announcement->type === 'urgent') border-red-500
            @elseif($announcement->type === 'warning') border-yellow-500
            @else border-blue-500 @endif">
            
            {{-- Featured Image --}}
            @if($announcement->image)
                <img src="{{ Storage::url($announcement->image) }}" alt="{{ $announcement->title }}" class="w-full h-64 md:h-96 object-cover">
            @endif

            <div class="p-8">
                {{-- Meta Info --}}
                <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                    <div class="flex items-center space-x-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            @if($announcement->type === 'urgent') bg-red-100 text-red-800
                            @elseif($announcement->type === 'warning') bg-yellow-100 text-yellow-800
                            @else bg-blue-100 text-blue-800 @endif">
                            @if($announcement->type === 'urgent') 
                                <i class="fas fa-exclamation-triangle mr-1"></i>Penting
                            @elseif($announcement->type === 'warning') 
                                <i class="fas fa-exclamation-circle mr-1"></i>Peringatan
                            @else 
                                <i class="fas fa-info-circle mr-1"></i>Informasi
                            @endif
                        </span>
                        <span><i class="fas fa-calendar mr-1"></i>{{ $announcement->start_date->format('d F Y') }}</span>
                        @if($announcement->end_date)
                            <span><i class="fas fa-clock mr-1"></i>Berlaku sampai: {{ $announcement->end_date->format('d F Y') }}</span>
                        @endif
                    </div>
                    <span><i class="fas fa-eye mr-1"></i>{{ $announcement->views }} views</span>
                </div>

                {{-- Title --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">{{ $announcement->title }}</h1>

                {{-- Content --}}
                <div class="prose prose-lg max-w-none">
                    {!! $announcement->content !!}
                </div>

                {{-- Important Notice --}}
                @if($announcement->type === 'urgent')
                <div class="mt-8 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-600 mr-2"></i>
                        <span class="text-red-800 font-medium">Pengumuman Penting</span>
                    </div>
                    <p class="text-red-700 text-sm mt-1">Harap perhatikan dengan seksama pengumuman ini karena bersifat mendesak.</p>
                </div>
                @endif

                {{-- Period Info --}}
                @if($announcement->end_date)
                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-blue-800 font-medium">
                                <i class="fas fa-calendar-check mr-2"></i>Periode Berlaku
                            </span>
                            <p class="text-blue-700 text-sm mt-1">
                                {{ $announcement->start_date->format('d F Y') }} - {{ $announcement->end_date->format('d F Y') }}
                            </p>
                        </div>
                        @if($announcement->end_date->isFuture())
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                <i class="fas fa-check-circle mr-1"></i>Masih Berlaku
                            </span>
                        @else
                            <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">
                                <i class="fas fa-times-circle mr-1"></i>Sudah Berakhir
                            </span>
                        @endif
                    </div>
                </div>
                @endif

                {{-- Share & Back --}}
                <div class="flex justify-between items-center mt-8 pt-8 border-t">
                    <a href="{{ route('announcements.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Pengumuman
                    </a>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-500">Bagikan:</span>
                        <div class="flex space-x-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                               class="text-blue-600 hover:text-blue-700 p-2 rounded-full hover:bg-blue-50"
                               target="_blank">
                                <i class="fab fa-facebook text-lg"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $announcement->title }}" 
                               class="text-blue-400 hover:text-blue-500 p-2 rounded-full hover:bg-blue-50"
                               target="_blank">
                                <i class="fab fa-twitter text-lg"></i>
                            </a>
                            <a href="https://wa.me/?text={{ $announcement->title }} {{ url()->current() }}" 
                               class="text-green-600 hover:text-green-700 p-2 rounded-full hover:bg-green-50"
                               target="_blank">
                                <i class="fab fa-whatsapp text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        {{-- Recent Announcements --}}
        @if($recent->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                <i class="fas fa-megaphone mr-2"></i>Pengumuman Terbaru
            </h2>
            <div class="space-y-4">
                @foreach($recent as $item)
                <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow border-l-4
                    @if($item->type === 'urgent') border-red-500
                    @elseif($item->type === 'warning') border-yellow-500
                    @else border-blue-500 @endif">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="px-2 py-1 rounded text-xs font-medium
                                    @if($item->type === 'urgent') bg-red-100 text-red-800
                                    @elseif($item->type === 'warning') bg-yellow-100 text-yellow-800
                                    @else bg-blue-100 text-blue-800 @endif">
                                    {{ ucfirst($item->type) }}
                                </span>
                                <span class="text-xs text-gray-500">{{ $item->start_date->format('d M Y') }}</span>
                            </div>
                            <h3 class="font-bold hover:text-blue-600 mb-1">
                                <a href="{{ route('announcements.show', $item->slug) }}">{{ $item->title }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                        </div>
                        <a href="{{ route('announcements.show', $item->slug) }}" 
                           class="ml-4 text-blue-600 hover:text-blue-700 text-sm font-medium">
                            Baca →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection