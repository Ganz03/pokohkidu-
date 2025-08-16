{{-- resources/views/lembaga-desa/detail.blade.php --}}
@extends('layouts.app')

@section('title', $lembaga->nama_lembaga)

@section('content')
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-8">
            <a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('lembaga-desa.index') }}" class="hover:text-blue-600">Lembaga Desa</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">{{ $lembaga->nama_lembaga }}</span>
        </nav>

        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-8 text-white">
                <div class="flex items-start space-x-6">
                    @if($lembaga->logo_url)
                        <div class="w-24 h-24 bg-white rounded-full p-3 shadow-lg flex-shrink-0">
                            <img src="{{ $lembaga->logo_url }}" 
                                 alt="Logo {{ $lembaga->nama_lembaga }}" 
                                 class="w-full h-full object-contain">
                        </div>
                    @else
                        <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-building text-3xl"></i>
                        </div>
                    @endif
                    
                    <div class="flex-1">
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">
                            {{ $lembaga->nama_lembaga }}
                        </h1>
                        @if($lembaga->singkatan)
                            <p class="text-blue-200 text-lg font-medium mb-3">
                                ({{ $lembaga->singkatan }})
                            </p>
                        @endif
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            @if($lembaga->dasar_hukum)
                                <div>
                                    <span class="font-medium">Dasar Hukum:</span>
                                    <span class="text-blue-100">{{ $lembaga->dasar_hukum }}</span>
                                </div>
                            @endif
                            @if($lembaga->alamat_kantor)
                                <div>
                                    <span class="font-medium">Alamat:</span>
                                    <span class="text-blue-100">{{ $lembaga->alamat_kantor }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-gray-50 border-t">
                <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-gray-200">
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ $statistics['total_pengurus'] }}</div>
                        <div class="text-sm text-gray-600">Total Pengurus</div>
                    </div>
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-green-600">{{ $statistics['pengurus_aktif'] }}</div>
                        <div class="text-sm text-gray-600">Pengurus Aktif</div>
                    </div>
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-purple-600">{{ $statistics['pengurus_s1_keatas'] }}</div>
                        <div class="text-sm text-gray-600">S1 ke Atas</div>
                    </div>
                    <div class="p-4 text-center">
                        <div class="text-2xl font-bold text-yellow-600">{{ $statistics['rata_rata_masa_jabatan'] }}</div>
                        <div class="text-sm text-gray-600">Rata-rata Masa Jabatan</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Profil -->
                @if($lembaga->profil)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <div class="w-1 h-6 bg-blue-600 rounded-full mr-3"></div>
                            Profil Lembaga
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $lembaga->profil !!}
                        </div>
                    </div>
                @endif

                <!-- Visi Misi -->
                @if($lembaga->visi || $lembaga->misi)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <div class="w-1 h-6 bg-green-600 rounded-full mr-3"></div>
                            Visi & Misi
                        </h2>
                        
                        @if($lembaga->visi)
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Visi</h3>
                                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                                    <p class="text-gray-700 italic">{{ $lembaga->visi }}</p>
                                </div>
                            </div>
                        @endif

                        @if($lembaga->misi)
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-3">Misi</h3>
                                <div class="prose max-w-none text-gray-700">
                                    {!! $lembaga->misi !!}
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Tugas Pokok & Fungsi -->
                @if($lembaga->tugas_pokok_fungsi)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <div class="w-1 h-6 bg-purple-600 rounded-full mr-3"></div>
                            Tugas Pokok & Fungsi
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $lembaga->tugas_pokok_fungsi !!}
                        </div>
                    </div>
                @endif

                <!-- Hak -->
                @if($lembaga->hak)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <div class="w-1 h-6 bg-blue-600 rounded-full mr-3"></div>
                            Hak
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $lembaga->hak !!}
                        </div>
                    </div>
                @endif

                <!-- Kewajiban -->
                @if($lembaga->kewajiban)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <div class="w-1 h-6 bg-red-600 rounded-full mr-3"></div>
                            Kewajiban
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $lembaga->kewajiban !!}
                        </div>
                    </div>
                @endif

                <!-- Tugas & Wewenang -->
                @if($lembaga->tugas_wewenang)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                            <div class="w-1 h-6 bg-yellow-600 rounded-full mr-3"></div>
                            Tugas & Wewenang
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $lembaga->tugas_wewenang !!}
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Foto Kantor -->
                @if($lembaga->foto_kantor_url)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <img src="{{ $lembaga->foto_kantor_url }}" 
                             alt="Kantor {{ $lembaga->nama_lembaga }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800">Kantor {{ $lembaga->singkatan ?: $lembaga->nama_lembaga }}</h3>
                        </div>
                    </div>
                @endif

                <!-- Kepengurusan -->
                @if($lembaga->pengurusAktif && $lembaga->pengurusAktif->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Kepengurusan</h3>
                        
                        <div class="space-y-4">
                            @foreach($lembaga->pengurusAktif as $pengurus)
                                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                    @if($pengurus->foto_url)
                                        <img src="{{ $pengurus->foto_url }}" 
                                             alt="{{ $pengurus->nama }}" 
                                             class="w-12 h-12 rounded-full object-cover">
                                    @else
                                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                    
                                    <div class="flex-1 min-w-0">
                                        <p class="font-semibold text-gray-900 truncate">{{ $pengurus->nama }}</p>
                                        <p class="text-sm text-blue-600">{{ $pengurus->jabatan }}</p>
                                        @if($pengurus->pendidikan)
                                            <p class="text-xs text-gray-500">{{ $pengurus->pendidikan }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Galeri -->
                @if($lembaga->galeri_foto_urls && count($lembaga->galeri_foto_urls) > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Galeri</h3>
                        
                        <div class="grid grid-cols-2 gap-2">
                            @foreach(array_slice($lembaga->galeri_foto_urls, 0, 4) as $foto)
                                <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                                    <img src="{{ $foto }}" 
                                         alt="Galeri {{ $lembaga->nama_lembaga }}" 
                                         class="w-full h-full object-cover hover:scale-110 transition-transform cursor-pointer"
                                         onclick="openImageModal('{{ $foto }}')">
                                </div>
                            @endforeach
                        </div>
                        
                        @if(count($lembaga->galeri_foto_urls) > 4)
                            <p class="text-sm text-gray-500 mt-2 text-center">
                                +{{ count($lembaga->galeri_foto_urls) - 4 }} foto lainnya
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="max-w-4xl max-h-full">
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<script>
function openImageModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>
@endsection