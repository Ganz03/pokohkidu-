{{-- resources/views/services/kk/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Layanan Kartu Keluarga (KK)')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Layanan Kartu Keluarga (KK)</h1>
        <p class="text-gray-600">Pilih jenis layanan KK yang Anda butuhkan</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                @if($service->image)
                    <div class="h-48 bg-gray-200 rounded-t-lg overflow-hidden">
                        <img src="{{ Storage::url($service->image) }}" 
                             alt="{{ $service->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                @endif
                
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $service->name }}</h3>
                    
                    @if($service->description)
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ $service->description }}</p>
                    @endif
                    
                    <a href="{{ route('services.kk.show', $service->slug) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                        <span>Lihat Detail</span>
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-gray-400 mb-4">
                    <svg class="mx-auto w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Layanan</h3>
                <p class="text-gray-600">Layanan KK belum tersedia saat ini.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

