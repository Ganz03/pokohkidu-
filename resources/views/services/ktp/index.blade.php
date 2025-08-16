{{-- resources/views/services/ktp/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Layanan Kartu Tanda Penduduk (KTP)')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 py-12">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Layanan Kartu Tanda Penduduk (KTP)</h1>
            <p class="text-gray-600">Pilih jenis layanan KTP yang Anda butuhkan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $service->name }}</h3>
                    
                    @if($service->description)
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed">{{ $service->description }}</p>
                    @endif
                    
                    <a href="{{ route('services.ktp.show', $service->slug) }}" 
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Layanan</h3>
                    <p class="text-gray-600">Layanan KTP belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
