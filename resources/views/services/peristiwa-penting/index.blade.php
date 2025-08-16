{{-- resources/views/services/peristiwa-penting/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Layanan Peristiwa Penting/Akta')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 py-12">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Layanan Peristiwa Penting/Akta</h1>
            <p class="text-gray-600">Pilih jenis layanan akta atau peristiwa penting yang Anda butuhkan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $service->name }}</h3>
                    
                    @if($service->description)
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">{{ $service->description }}</p>
                    @endif
                    
                    <a href="{{ route('services.peristiwa-penting.show', $service->slug) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors duration-200">
                        Lihat Detail
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-gray-400 mb-4">
                        <svg class="mx-auto w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Layanan</h3>
                    <p class="text-gray-600">Layanan Peristiwa Penting belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
