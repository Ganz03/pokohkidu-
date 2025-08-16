@extends('layouts.app')

@section('title', $service->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-4">
            <a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a>
            <span>/</span>
            <a href="{{ route('services.kk.index') }}" class="hover:text-blue-600">Layanan KK</a>
            <span>/</span>
            <span class="text-gray-900">{{ $service->name }}</span>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $service->name }}</h1>
            
            @if($service->description)
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                    <h2 class="text-lg font-semibold text-blue-900 mb-2">Deskripsi Layanan</h2>
                    <p class="text-blue-800">{{ $service->description }}</p>
                </div>
            @endif

            @if($service->requirements)
                <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Syarat-syarat
                    </h2>
                    <div class="space-y-2">
                        @foreach(explode("\n", $service->requirements) as $requirement)
                            @if(trim($requirement))
                                <div class="flex items-start">
                                    <span class="text-blue-500 mr-2 mt-1">•</span>
                                    <span class="text-gray-700">{{ trim($requirement) }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h3 class="font-semibold text-yellow-800 mb-2">Informasi Penting</h3>
                <p class="text-yellow-700 text-sm">
                    Pastikan semua dokumen yang diperlukan sudah lengkap dan sesuai dengan ketentuan yang berlaku. 
                    Untuk informasi lebih lanjut, silakan hubungi kantor desa atau kunjungi langsung.
                </p>
            </div>
        </div>

        <div class="lg:col-span-1">
            @if($service->image)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden mb-6">
                    <img src="{{ Storage::url($service->image) }}" 
                         alt="{{ $service->name }}" 
                         class="w-full h-64 object-cover">
                </div>
            @endif

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Butuh Bantuan?</h3>
                <p class="text-gray-600 text-sm mb-4">
                    Jika Anda memiliki pertanyaan atau memerlukan bantuan lebih lanjut, silakan hubungi:
                </p>
                <div class="space-y-2 text-sm">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-gray-700">Kantor Desa</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-700">Jam Kerja: 08:00 - 16:00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection