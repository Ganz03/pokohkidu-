{{-- resources/views/organization/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Struktur <span class="text-blue-600">Organisasi</span>
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Susunan pemerintahan dan perangkat Desa Pokoh Kidul
            </p>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>

        @if($positions && $positions->count() > 0)
            <!-- Organization Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($positions as $position)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                        <div class="p-6">
                            <!-- Profile Photo -->
                            <div class="text-center mb-6">
                                <div class="w-24 h-24 mx-auto mb-4 rounded-full {{ $position->photo_url ? '' : 'bg-gradient-to-br from-blue-400 to-blue-600' }} flex items-center justify-center shadow-lg overflow-hidden">
                                    @if($position->photo_url)
                                        <img src="{{ $position->photo_url }}" alt="{{ $position->person_name }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-user text-white text-2xl"></i>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-1">
                                    {{ $position->person_name ?: 'Belum Diisi' }}
                                </h3>
                                <p class="text-blue-600 font-semibold mb-4">{{ $position->position_name }}</p>
                            </div>

                            <!-- Action Button -->
                            <div class="text-center">
                                <a href="{{ route('organization.show', $position) }}" 
                                   class="inline-flex items-center justify-center w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition-all duration-300 text-sm">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-users text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Data Organisasi</h3>
                    <p class="text-gray-600 mb-6">Struktur organisasi akan ditampilkan di sini setelah ditambahkan oleh administrator.</p>
                    <a href="{{ route('welcome') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection