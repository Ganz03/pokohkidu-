{{-- resources/views/potensi-desa/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Potensi Desa')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Header -->
        <div class="mb-8">
            <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-4">
                <a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a>
                <span>/</span>
                <span class="text-gray-900">Potensi Desa</span>
            </nav>
            
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Informasi Potensi Desa</h1>
            <p class="text-gray-600 mb-6">
                Menyajikan Informasi data desa yang bersumber dari prodeskel dan epdeskel. Pengumpulan dan Pengelolaan data dan informasi berada di Direktorat Jenderal Bina Pemerintahan Desa. Fitur integrasi dan validasi data oleh Pemerintah, Pemerintah Provinsi, Pemerintah Kabupaten/Kota dan Desa sesuai ketentuan yang berlaku.
            </p>
            
            <!-- Year Filter -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tahun</label>
                <select onchange="window.location.href='{{ route('potensi-desa.index') }}?tahun=' + this.value" 
                        class="border border-gray-300 rounded-md px-3 py-2 bg-white">
                    @foreach($availableYears as $year)
                        <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if($potensiDesa)
            <!-- Tabs -->
            <div class="mb-8">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button onclick="showTab('penduduk')" id="tab-penduduk" 
                                class="tab-button border-b-2 border-blue-500 text-blue-600 py-2 px-1 text-sm font-medium">
                            Potensi Penduduk
                        </button>
                        <button onclick="showTab('wilayah')" id="tab-wilayah" 
                                class="tab-button border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 py-2 px-1 text-sm font-medium">
                            Potensi Wilayah
                        </button>
                        <button onclick="showTab('sarana')" id="tab-sarana" 
                                class="tab-button border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 py-2 px-1 text-sm font-medium">
                            Sarana & Prasarana
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Tab Content -->
            <!-- Potensi Penduduk -->
            <div id="content-penduduk" class="tab-content">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Jumlah Penduduk -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 text-center font-semibold">
                            Jumlah Penduduk
                        </div>
                        <div class="p-6 text-center">
                            <div class="text-3xl font-bold text-gray-900 mb-2">{{ $potensiDesa->formatNumber($potensiDesa->total_penduduk) }} Jiwa</div>
                        </div>
                    </div>

                    <!-- Laki-Laki -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-100 text-blue-800 px-4 py-3 text-center font-semibold">
                            Laki-Laki
                        </div>
                        <div class="p-6 text-center">
                            <div class="text-3xl font-bold text-gray-900 mb-2">{{ $potensiDesa->formatNumber($potensiDesa->jumlah_penduduk_laki) }} Jiwa</div>
                        </div>
                    </div>

                    <!-- Perempuan -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-red-100 text-red-800 px-4 py-3 text-center font-semibold">
                            Perempuan
                        </div>
                        <div class="p-6 text-center">
                            <div class="text-3xl font-bold text-gray-900 mb-2">{{ $potensiDesa->formatNumber($potensiDesa->jumlah_penduduk_perempuan) }} Jiwa</div>
                        </div>
                    </div>
                </div>

                <!-- Chart Placeholder -->
                <div class="bg-white border border-gray-200 rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">Jumlah Penduduk</h3>
                    <div class="flex justify-center items-center h-64">
                        <div class="text-center">
                            <div class="w-32 h-32 mx-auto mb-4 border-4 border-blue-200 rounded-full flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-sm text-gray-600">Total</div>
                                    <div class="text-lg font-bold">{{ $potensiDesa->formatNumber($potensiDesa->total_penduduk) }}</div>
                                </div>
                            </div>
                            <div class="flex justify-center space-x-8 text-sm">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                    <span>Laki-Laki: {{ $potensiDesa->persentase_laki }}%</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                    <span>Perempuan: {{ $potensiDesa->persentase_perempuan }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded text-center font-semibold mb-4">
                            Jumlah Kepala Keluarga
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">{{ $potensiDesa->formatNumber($potensiDesa->jumlah_kepala_keluarga) }} KK</div>
                        </div>
                    </div>

                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded text-center font-semibold mb-4">
                            Kepadatan Penduduk
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-gray-900">{{ number_format($potensiDesa->kepadatan_penduduk, 2) }} Jiwa/km2</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Potensi Wilayah -->
            <div id="content-wilayah" class="tab-content hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Luas Wilayah -->
                    <div class="space-y-6">
                        <div class="bg-white border border-gray-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Luas Wilayah</h3>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600">{{ number_format($potensiDesa->luas_wilayah, 2) }} km²</div>
                            </div>
                        </div>

                        <!-- Batas Wilayah -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                            <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                                Batas Wilayah Desa
                            </div>
                            <div class="p-6 space-y-4">
                                @if($potensiDesa->batas_wilayah_utara)
                                    <div>
                                        <span class="font-medium text-gray-700">Utara:</span>
                                        <span class="text-gray-600">{{ $potensiDesa->batas_wilayah_utara }}</span>
                                    </div>
                                @endif
                                @if($potensiDesa->batas_wilayah_selatan)
                                    <div>
                                        <span class="font-medium text-gray-700">Selatan:</span>
                                        <span class="text-gray-600">{{ $potensiDesa->batas_wilayah_selatan }}</span>
                                    </div>
                                @endif
                                @if($potensiDesa->batas_wilayah_timur)
                                    <div>
                                        <span class="font-medium text-gray-700">Timur:</span>
                                        <span class="text-gray-600">{{ $potensiDesa->batas_wilayah_timur }}</span>
                                    </div>
                                @endif
                                @if($potensiDesa->batas_wilayah_barat)
                                    <div>
                                        <span class="font-medium text-gray-700">Barat:</span>
                                        <span class="text-gray-600">{{ $potensiDesa->batas_wilayah_barat }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Orbitasi Desa -->
                        @if($potensiDesa->orbitasi_desa)
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                                <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                                    Orbitasi Desa
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-700">{{ $potensiDesa->orbitasi_desa }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Potensi Wisata -->
                        @if($potensiDesa->potensi_wisata)
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                                <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                                    Potensi Wisata
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-700">{{ $potensiDesa->potensi_wisata }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Jenis Lahan -->
                    <div>
                        @if($potensiDesa->jenis_lahan && count($potensiDesa->jenis_lahan) > 0)
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                                <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                                    Jenis Lahan
                                </div>
                                <div class="p-6">
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm">
                                            <thead>
                                                <tr class="border-b border-gray-200">
                                                    <th class="text-left py-3 px-4 font-medium text-gray-700">Jenis Lahan</th>
                                                    <th class="text-right py-3 px-4 font-medium text-gray-700">Luas (Ha)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($potensiDesa->jenis_lahan as $lahan)
                                                    <tr class="border-b border-gray-100">
                                                        <td class="py-3 px-4">{{ $lahan['nama'] ?? '' }}</td>
                                                        <td class="text-right py-3 px-4">{{ number_format($lahan['luas'] ?? 0, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sarana & Prasarana -->
            <div id="content-sarana" class="tab-content hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Kantor Desa -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Kantor Desa
                        </div>
                        <div class="p-6">
                            <p class="text-gray-700">{{ $potensiDesa->kantor_desa ?: 'Tidak ada data yang ditampilkan' }}</p>
                        </div>
                    </div>

                    <!-- Lembaga Pemerintahan -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Lembaga Pemerintahan
                        </div>
                        <div class="p-6">
                            @if($potensiDesa->lembaga_pemerintahan && count($potensiDesa->lembaga_pemerintahan) > 0)
                                <div class="space-y-3">
                                    @foreach($potensiDesa->lembaga_pemerintahan as $lembaga)
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $lembaga['nama'] ?? '' }}</div>
                                            @if(!empty($lembaga['keterangan']))
                                                <div class="text-sm text-gray-600">{{ $lembaga['keterangan'] }}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-700">Tidak ada data yang ditampilkan</p>
                            @endif
                        </div>
                    </div>

                    <!-- PKK -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Sarana dan Prasarana PKK
                        </div>
                        <div class="p-6">
                            @if($potensiDesa->sarana_prasarana_pkk && count($potensiDesa->sarana_prasarana_pkk) > 0)
                                <div class="space-y-3">
                                    @foreach($potensiDesa->sarana_prasarana_pkk as $item)
                                        <div class="flex justify-between">
                                            <span>{{ $item['nama'] ?? '' }}</span>
                                            <span class="font-medium">{{ $item['jumlah'] ?? 0 }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-700">Tidak ada data yang ditampilkan</p>
                            @endif
                        </div>
                    </div>

                    <!-- Pendidikan -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Sarana dan Prasarana Pendidikan
                        </div>
                        <div class="p-6">
                            @if($potensiDesa->sarana_prasarana_pendidikan && count($potensiDesa->sarana_prasarana_pendidikan) > 0)
                                <div class="space-y-3">
                                    @foreach($potensiDesa->sarana_prasarana_pendidikan as $item)
                                        <div class="flex justify-between">
                                            <span>{{ $item['nama'] ?? '' }}</span>
                                            <span class="font-medium">{{ $item['jumlah'] ?? 0 }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-700">Tidak ada data yang ditampilkan</p>
                            @endif
                        </div>
                    </div>

                    <!-- Peribadatan -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Sarana dan Prasarana Peribadatan
                        </div>
                        <div class="p-6">
                            @if($potensiDesa->sarana_prasarana_peribadatan && count($potensiDesa->sarana_prasarana_peribadatan) > 0)
                                <div class="space-y-3">
                                    @foreach($potensiDesa->sarana_prasarana_peribadatan as $item)
                                        <div class="flex justify-between">
                                            <span>{{ $item['nama'] ?? '' }}</span>
                                            <span class="font-medium">{{ $item['jumlah'] ?? 0 }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-700">Tidak ada data yang ditampilkan</p>
                            @endif
                        </div>
                    </div>

                    <!-- Kesehatan -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Sarana dan Prasarana Kesehatan
                        </div>
                        <div class="p-6">
                            @if($potensiDesa->sarana_prasarana_kesehatan && count($potensiDesa->sarana_prasarana_kesehatan) > 0)
                                <div class="space-y-3">
                                    @foreach($potensiDesa->sarana_prasarana_kesehatan as $item)
                                        <div class="flex justify-between">
                                            <span>{{ $item['nama'] ?? '' }}</span>
                                            <span class="font-medium">{{ $item['jumlah'] ?? 0 }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-700">Tidak ada data yang ditampilkan</p>
                            @endif
                        </div>
                    </div>

                    <!-- Air Bersih -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Sarana dan Prasarana Air Bersih
                        </div>
                        <div class="p-6">
                            @if($potensiDesa->sarana_prasarana_air_bersih && count($potensiDesa->sarana_prasarana_air_bersih) > 0)
                                <div class="space-y-3">
                                    @foreach($potensiDesa->sarana_prasarana_air_bersih as $item)
                                        <div class="flex justify-between">
                                            <span>{{ $item['nama'] ?? '' }}</span>
                                            <span class="font-medium">{{ $item['jumlah'] ?? 0 }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-700">Tidak ada data yang ditampilkan</p>
                            @endif
                        </div>
                    </div>

                    <!-- Irigasi -->
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-blue-600 text-white px-4 py-3 font-semibold">
                            Sarana dan Prasarana Irigasi
                        </div>
                        <div class="p-6">
                            @if($potensiDesa->sarana_prasarana_irigasi && count($potensiDesa->sarana_prasarana_irigasi) > 0)
                                <div class="space-y-3">
                                    @foreach($potensiDesa->sarana_prasarana_irigasi as $item)
                                        <div>
                                            <div class="flex justify-between">
                                                <span>{{ $item['nama'] ?? '' }}</span>
                                                <span class="font-medium">{{ $item['jumlah'] ?? 0 }}</span>
                                            </div>
                                            @if(!empty($item['keterangan']))
                                                <div class="text-sm text-gray-600 mt-1">{{ $item['keterangan'] }}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-700">Tidak ada data yang ditampilkan</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Data Potensi Desa</h3>
                <p class="text-gray-600">Data potensi desa untuk tahun {{ $tahun }} belum tersedia.</p>
            </div>
        @endif
    </div>
</div>

<script>
function showTab(tabName) {
    // Hide all tab contents
    const contents = document.querySelectorAll('.tab-content');
    contents.forEach(content => content.classList.add('hidden'));
    
    // Remove active class from all tabs
    const tabs = document.querySelectorAll('.tab-button');
    tabs.forEach(tab => {
        tab.classList.remove('border-blue-500', 'text-blue-600');
        tab.classList.add('border-transparent', 'text-gray-500');
    });
    
    // Show selected tab content
    document.getElementById('content-' + tabName).classList.remove('hidden');
    
    // Add active class to selected tab
    const activeTab = document.getElementById('tab-' + tabName);
    activeTab.classList.remove('border-transparent', 'text-gray-500');
    activeTab.classList.add('border-blue-500', 'text-blue-600');
}
</script>
@endsection