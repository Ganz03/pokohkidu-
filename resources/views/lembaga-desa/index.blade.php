{{-- resources/views/lembaga-desa/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Lembaga Desa')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-8">
            <a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Lembaga Desa</span>
        </nav>

        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4">
                Lembaga Desa
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Lembaga-lembaga yang berperan dalam penyelenggaraan pemerintahan dan pembangunan Desa Pokoh Kidul
            </p>
        </div>

        @if($lembagaList && $lembagaList->count() > 0)
            <!-- Lembaga Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($lembagaList as $lembaga)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:-translate-y-2 group"
                         onclick="window.location.href='{{ route('lembaga-desa.show', $lembaga->slug) }}'">
                        
                        <!-- Header dengan Logo -->
                        <div class="relative bg-gradient-to-br from-blue-600 to-blue-700 p-6 text-white">
                            <div class="flex items-center space-x-4">
                                @if($lembaga->logo_url)
                                    <div class="w-16 h-16 bg-white rounded-full p-2 shadow-lg">
                                        <img src="{{ $lembaga->logo_url }}" 
                                             alt="Logo {{ $lembaga->nama_lembaga }}" 
                                             class="w-full h-full object-contain">
                                    </div>
                                @else
                                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                        <i class="fas fa-building text-2xl"></i>
                                    </div>
                                @endif
                                
                                <div class="flex-1">
                                    <h3 class="font-bold text-lg leading-tight mb-1">
                                        {{ $lembaga->nama_lembaga }}
                                    </h3>
                                    @if($lembaga->singkatan)
                                        <p class="text-blue-200 text-sm font-medium">
                                            ({{ $lembaga->singkatan }})
                                        </p>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Decorative element -->
                            <div class="absolute top-0 right-0 w-20 h-20 bg-white bg-opacity-10 rounded-full -mr-10 -mt-10"></div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            @if($lembaga->profil)
                                <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                    {!! Str::limit(strip_tags($lembaga->profil), 150) !!}
                                </p>
                            @endif

                            <!-- Info Cards -->
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="bg-blue-50 rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold text-blue-600">{{ $lembaga->pengurus_aktif_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-600">Pengurus Aktif</div>
                                </div>
                                <div class="bg-green-50 rounded-lg p-3 text-center">
                                    <div class="text-xl font-bold text-green-600">{{ $lembaga->pengurus_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-600">Total Pengurus</div>
                                </div>
                            </div>

                            <!-- Action Button -->
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">
                                    <i class="fas fa-eye mr-1"></i>
                                    Lihat Detail
                                </span>
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                                    <i class="fas fa-arrow-right text-blue-600 text-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Summary Statistics -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Statistik Lembaga Desa</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                        <div class="text-3xl font-bold text-blue-600">{{ $lembagaList->count() }}</div>
                        <div class="text-sm text-gray-600">Total Lembaga</div>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="text-3xl font-bold text-green-600">{{ $lembagaList->sum('pengurus_aktif_count') }}</div>
                        <div class="text-sm text-gray-600">Total Pengurus Aktif</div>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-lg">
                        <div class="text-3xl font-bold text-purple-600">{{ $lembagaList->sum('pengurus_count') }}</div>
                        <div class="text-sm text-gray-600">Total Pengurus</div>
                    </div>
                    <div class="text-center p-4 bg-yellow-50 rounded-lg">
                        <div class="text-3xl font-bold text-yellow-600">{{ $lembagaList->where('logo_url', '!=', null)->count() }}</div>
                        <div class="text-sm text-gray-600">Dengan Logo</div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-building text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Data Lembaga</h3>
                <p class="text-gray-600">Data lembaga desa akan segera diperbarui.</p>
            </div>
        @endif
    </div>
</section>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection