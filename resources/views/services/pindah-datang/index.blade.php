{{-- resources/views/services/pindah-datang/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Layanan Pindah Datang Tercecer')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 py-12">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Layanan Pindah Datang Tercecer</h1>
            <p class="text-gray-600">Pilih jenis layanan pindah datang yang Anda butuhkan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $service->name }}</h3>
                    
                    @if($service->description)
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">{{ $service->description }}</p>
                    @endif
                    
                    <a href="{{ route('services.pindah-datang.show', $service->slug) }}" 
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Layanan</h3>
                    <p class="text-gray-600">Layanan Pindah Datang belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection