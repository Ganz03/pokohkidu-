{{-- resources/views/perangkat-desa/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Perangkat Desa')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-8">
            <a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800">Perangkat Desa</span>
        </nav>

        <!-- Page Header -->
        <div class="text-left mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4">
                Perangkat Desa
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl">
                Susunan perangkat dan pejabat Desa Pokoh Kidul yang bertugas melayani masyarakat
            </p>
        </div>

        @if($positions && $positions->count() > 0)
            <!-- Perangkat Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-16">
                @foreach($positions as $position)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:-translate-y-2 group h-full flex flex-col"
                         onclick="openModal('{{ $position->id ?? '' }}')">
                        <!-- Photo Section with Red Background -->
                        <div class="relative h-64 bg-red-600 flex items-center justify-center overflow-hidden flex-shrink-0">
                            @if($position->foto_url)
                                <img src="{{ $position->foto_url }}" 
                                     alt="{{ $position->nama_pejabat }}" 
                                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                            @else
                                <!-- Placeholder dengan background merah -->
                                <div class="w-full h-full bg-red-600 flex items-center justify-center transition-all duration-300 group-hover:bg-red-700">
                                    <i class="fas fa-user text-white text-6xl opacity-50 transition-all duration-300 group-hover:opacity-70 group-hover:scale-110"></i>
                                </div>
                            @endif
                            <!-- Overlay hover effect -->
                            <div class="absolute inset-0 bg-black opacity-0 transition-opacity duration-300 group-hover:opacity-20"></div>
                        </div>
                        
                        <!-- Info Section with Blue Background -->
                        <div class="bg-blue-500 text-white p-4 text-center flex-grow flex flex-col justify-center transition-all duration-300 group-hover:bg-blue-600 min-h-[120px]">
                            <h3 class="font-bold text-lg mb-2 uppercase leading-tight transition-all duration-300 group-hover:text-yellow-200">
                                {{ $position->nama_pejabat ?: 'BELUM DIISI' }}
                            </h3>
                            <p class="text-blue-100 text-sm uppercase font-medium leading-tight transition-all duration-300 group-hover:text-blue-50">
                                {{ $position->nama_jabatan }}
                            </p>
                        </div>
                    </div>

                    <!-- Modal untuk setiap position -->
                    <div id="modal-{{ $position->id ?? 'default' }}" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
                        <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-screen overflow-y-auto">
                            <!-- Modal Header -->
                            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 rounded-full {{ $position->foto_url ? '' : 'bg-gradient-to-br from-red-400 to-red-600' }} flex items-center justify-center shadow-lg overflow-hidden">
                                        @if($position->foto_url)
                                            <img src="{{ $position->foto_url }}" alt="{{ $position->nama_pejabat }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fas fa-user text-white text-xl"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-800">
                                            {{ $position->nama_pejabat ?: 'Belum Diisi' }}
                                        </h2>
                                        <p class="text-blue-600 font-semibold">{{ $position->nama_jabatan }}</p>
                                        @if($position->nip)
                                            <p class="text-gray-500 text-sm">NIP: {{ $position->nip }}</p>
                                        @endif
                                    </div>
                                </div>
                                <button onclick="closeModal('{{ $position->id ?? '' }}')" class="text-gray-400 hover:text-gray-600 transition-colors">
                                    <i class="fas fa-times text-2xl"></i>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="p-6">
                                <!-- Informasi Tambahan -->
                                @if($position->pendidikan || $position->tanggal_mulai_jabatan)
                                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                                        <h3 class="font-semibold text-gray-800 mb-3">Informasi Pejabat</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                            @if($position->pendidikan)
                                                <div>
                                                    <span class="font-medium text-gray-600">Pendidikan:</span>
                                                    <span class="text-gray-800">{{ $position->pendidikan }}</span>
                                                </div>
                                            @endif
                                            @if($position->tanggal_mulai_jabatan)
                                                <div>
                                                    <span class="font-medium text-gray-600">Mulai Menjabat:</span>
                                                    <span class="text-gray-800">{{ $position->tanggal_mulai_jabatan->format('d F Y') }}</span>
                                                    @if($position->lama_jabatan)
                                                        <span class="text-gray-500">({{ $position->lama_jabatan }})</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if($position->tugas_fungsi || $position->wewenang || $position->hak || $position->kewajiban)
                                    <!-- Duties Section -->
                                    @if($position->tugas_fungsi)
                                        <div class="mb-8">
                                            <div class="flex items-center mb-4">
                                                <div class="w-1 h-6 bg-blue-600 rounded-full mr-3"></div>
                                                <h3 class="text-xl font-bold text-gray-800">Kedudukan, Tugas & Fungsi</h3>
                                            </div>
                                            <div class="prose max-w-none text-gray-700">
                                                {!! $position->tugas_fungsi !!}
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Authorities Section -->
                                    @if($position->wewenang)
                                        <div class="mb-8">
                                            <div class="flex items-center mb-4">
                                                <div class="w-1 h-6 bg-green-600 rounded-full mr-3"></div>
                                                <h3 class="text-xl font-bold text-gray-800">Wewenang</h3>
                                            </div>
                                            <div class="prose max-w-none text-gray-700">
                                                {!! $position->wewenang !!}
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Rights Section -->
                                    @if($position->hak)
                                        <div class="mb-8">
                                            <div class="flex items-center mb-4">
                                                <div class="w-1 h-6 bg-purple-600 rounded-full mr-3"></div>
                                                <h3 class="text-xl font-bold text-gray-800">Hak</h3>
                                            </div>
                                            <div class="prose max-w-none text-gray-700">
                                                {!! $position->hak !!}
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Obligations Section -->
                                    @if($position->kewajiban)
                                        <div class="mb-8">
                                            <div class="flex items-center mb-4">
                                                <div class="w-1 h-6 bg-red-600 rounded-full mr-3"></div>
                                                <h3 class="text-xl font-bold text-gray-800">Kewajiban</h3>
                                            </div>
                                            <div class="prose max-w-none text-gray-700">
                                                {!! $position->kewajiban !!}
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <!-- Empty Content -->
                                    <div class="text-center py-8">
                                        <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-info-circle text-gray-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Belum Tersedia</h3>
                                        <p class="text-gray-600">Detail tugas, wewenang, hak, dan kewajiban untuk jabatan ini akan segera diperbarui.</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Modal Footer -->
                            <div class="flex justify-end p-6 border-t border-gray-200">
                                <button onclick="closeModal('{{ $position->id ?? '' }}')" 
                                        class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Statistics -->
            <div class="bg-white rounded-xl shadow-md p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Statistik Perangkat Desa</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                        <div class="text-3xl font-bold text-blue-600">{{ $statistics['total_positions'] }}</div>
                        <div class="text-sm text-gray-600">Total Perangkat</div>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="text-3xl font-bold text-green-600">{{ $statistics['filled_positions'] }}</div>
                        <div class="text-sm text-gray-600">Jabatan Terisi</div>
                    </div>
                    <div class="text-center p-4 bg-yellow-50 rounded-lg">
                        <div class="text-3xl font-bold text-yellow-600">{{ $statistics['empty_positions'] }}</div>
                        <div class="text-sm text-gray-600">Jabatan Kosong</div>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-lg">
                        <div class="text-3xl font-bold text-purple-600">{{ $statistics['with_photos'] }}</div>
                        <div class="text-sm text-gray-600">Dengan Foto</div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Data Perangkat Desa</h3>
                <p class="text-gray-600">Data perangkat desa akan segera diperbarui.</p>
            </div>
        @endif
    </div>
</section>

<!-- JavaScript untuk Modal -->
<script>
function openModal(id) {
    if (!id) return;
    const modal = document.getElementById('modal-' + id);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(id) {
    if (!id) return;
    const modal = document.getElementById('modal-' + id);
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('bg-black')) {
        const modals = document.querySelectorAll('[id^="modal-"]');
        modals.forEach(modal => {
            modal.classList.add('hidden');
        });
        document.body.style.overflow = 'auto';
    }
});

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modals = document.querySelectorAll('[id^="modal-"]');
        modals.forEach(modal => {
            modal.classList.add('hidden');
        });
        document.body.style.overflow = 'auto';
    }
});
</script>
@endsection

@push('styles')
<style>
.card-hover-effect {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-hover-effect:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.image-zoom {
    transition: transform 0.3s ease-in-out;
}

.image-zoom:hover {
    transform: scale(1.1);
}

.pulse-animation {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: .8;
    }
}
</style>
@endpush