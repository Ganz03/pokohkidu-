{{-- resources/views/organization/show.blade.php --}}
@extends('layouts.app')

@section('title', $organizationPosition->position_name ?? 'Struktur Organisasi')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 sticky top-8">
                    <h3 class="font-bold text-gray-800 mb-4">Perangkat Desa</h3>
                    
                    @if($allPositions && $allPositions->count() > 0)
                        <div class="space-y-2">
                            @foreach($allPositions as $position)
                                <a href="{{ route('organization.show', $position) }}" 
                                   class="flex items-center p-3 rounded-lg transition-colors {{ $position->id === $organizationPosition->id ? 'bg-blue-50 text-blue-600 border border-blue-200' : 'hover:bg-gray-50 text-gray-700' }}">
                                    <div class="w-8 h-8 {{ $position->id === $organizationPosition->id ? 'bg-blue-100' : 'bg-gray-100' }} rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user-tie text-xs {{ $position->id === $organizationPosition->id ? 'text-blue-600' : 'text-gray-600' }}"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-medium truncate">{{ $position->position_name }}</div>
                                        <div class="text-xs text-gray-500 truncate">
                                            {{ $position->person_name ?: 'Belum Diisi' }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Belum ada data perangkat desa.</p>
                    @endif
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Header Profile -->
                <div class="bg-white rounded-xl shadow-md p-8 mb-8 border border-gray-100">
                    <div class="flex flex-col md:flex-row items-start md:items-center space-y-6 md:space-y-0 md:space-x-8">
                        <!-- Profile Photo -->
                        <div class="flex-shrink-0">
                            <div class="w-32 h-32 rounded-full {{ $organizationPosition->photo_url ? '' : 'bg-gradient-to-br from-blue-400 to-blue-600' }} flex items-center justify-center shadow-lg overflow-hidden">
                                @if($organizationPosition->photo_url)
                                    <img src="{{ $organizationPosition->photo_url }}" alt="{{ $organizationPosition->person_name }}" class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-user text-white text-4xl"></i>
                                @endif
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div class="flex-1">
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                                {{ $organizationPosition->person_name ?: 'Belum Diisi' }}
                            </h1>
                            <p class="text-xl text-blue-600 font-semibold mb-4">{{ $organizationPosition->position_name }}</p>
                            
                            <!-- Breadcrumb -->
                            <nav class="text-sm text-gray-500">
                                <a href="{{ route('organization.index') }}" class="hover:text-blue-600">Struktur Organisasi</a>
                                <span class="mx-2">/</span>
                                <span class="text-gray-800">{{ $organizationPosition->position_name }}</span>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Duties Section -->
                @if($organizationPosition->duties)
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-blue-600 rounded-full mr-4"></div>
                            <h2 class="text-2xl font-bold text-gray-800">Kedudukan, Tugas & Fungsi</h2>
                        </div>
                        <div class="prose prose-lg max-w-none">
                            {!! App\Helpers\TextHelper::formatParagraphs($organizationPosition->duties) !!}
                        </div>
                    </div>
                @endif

                <!-- Authorities Section -->
                @if($organizationPosition->authorities)
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-green-600 rounded-full mr-4"></div>
                            <h2 class="text-2xl font-bold text-gray-800">Wewenang</h2>
                        </div>
                        <div class="prose prose-lg max-w-none">
                            {!! App\Helpers\TextHelper::formatList($organizationPosition->authorities) !!}
                        </div>
                    </div>
                @endif

                <!-- Rights Section -->
                @if($organizationPosition->rights)
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-purple-600 rounded-full mr-4"></div>
                            <h2 class="text-2xl font-bold text-gray-800">Hak</h2>
                        </div>
                        <div class="prose prose-lg max-w-none">
                            {!! App\Helpers\TextHelper::formatList($organizationPosition->rights) !!}
                        </div>
                    </div>
                @endif

                <!-- Obligations Section -->
                @if($organizationPosition->obligations)
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-8 bg-red-600 rounded-full mr-4"></div>
                            <h2 class="text-2xl font-bold text-gray-800">Kewajiban</h2>
                        </div>
                        <div class="prose prose-lg max-w-none">
                            {!! App\Helpers\TextHelper::formatList($organizationPosition->obligations) !!}
                        </div>
                    </div>
                @endif

                @if(!$organizationPosition->duties && !$organizationPosition->authorities && !$organizationPosition->rights && !$organizationPosition->obligations)
                    <div class="bg-white rounded-xl shadow-md p-8 mb-8 border border-gray-100 text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-info-circle text-gray-400 text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Belum Tersedia</h3>
                        <p class="text-gray-600">Detail tugas, wewenang, hak, dan kewajiban untuk jabatan ini akan segera diperbarui.</p>
                    </div>
                @endif

                <!-- Back Button -->
                <div class="text-center">
                    <a href="{{ route('organization.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Struktur Organisasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection