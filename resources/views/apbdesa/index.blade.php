{{-- resources/views/apbdesa/index.blade.php --}}
@extends('layouts.app')

@section('title', 'APBDesa')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">APBDesa</h1>
            <p class="text-gray-600">Transparansi Anggaran Pendapatan dan Belanja Desa</p>
        </div>

        <div class="space-y-6">
            @forelse($apbDesas as $apbDesa)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-600">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $apbDesa->tahun }}
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $apbDesa->tanggal_publikasi->format('d M Y') }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-blue-600 mb-3 hover:text-blue-700 transition-colors">
                            <a href="{{ route('apbdesa.show', $apbDesa->slug) }}">
                                {{ $apbDesa->judul }}
                            </a>
                        </h3>
                        
                        @if($apbDesa->excerpt)
                            <p class="text-gray-600 leading-relaxed mb-6">{{ $apbDesa->excerpt }}</p>
                        @endif
                        
                        <div class="flex items-center justify-between">
                            <a href="{{ route('apbdesa.show', $apbDesa->slug) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition-colors duration-200">
                                selengkapnya
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            
                            @if($apbDesa->total_pendapatan_rencana > 0)
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">Total Anggaran</p>
                                    <p class="text-lg font-bold text-green-600">
                                        {{ $apbDesa->formatRupiah($apbDesa->total_pendapatan_rencana) }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Data APBDesa</h3>
                    <p class="text-gray-600">Data APBDesa belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection