{{-- resources/views/apbdesa/show.blade.php --}}
@extends('layouts.app')

@section('title', $apbDesa->judul)

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 py-12">
        <div class="mb-8">
            <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-6">
                <a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a>
                <span>/</span>
                <a href="{{ route('apbdesa.index') }}" class="hover:text-blue-600">APBDesa</a>
                <span>/</span>
                <span class="text-gray-900">{{ $apbDesa->judul }}</span>
            </nav>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $apbDesa->judul }}</h1>
                <p class="text-gray-600">{{ $apbDesa->tanggal_publikasi->format('d F Y') }}</p>
            </div>

            @if($apbDesa->foto)
                <div class="mb-8 text-center">
                    <img src="{{ Storage::url($apbDesa->foto) }}" 
                         alt="{{ $apbDesa->judul }}" 
                         class="max-w-full h-auto rounded-lg shadow-md mx-auto">
                </div>
            @endif

            @if($apbDesa->excerpt)
                <div class="mb-8 p-4 bg-blue-50 border-l-4 border-blue-400 rounded-r-lg">
                    <p class="text-blue-800">{{ $apbDesa->excerpt }}</p>
                </div>
            @endif

            <!-- 1. Pendapatan Desa -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">1. Pendapatan Desa</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 text-sm">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="border border-gray-300 px-4 py-3 text-left"></th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Rencana / Anggaran</th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Realisasi</th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Lebih/Kurang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-blue-100">
                                <td colspan="4" class="border border-gray-300 px-4 py-2 font-semibold">PENDAPATAN ASLI DESA</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Hasil Usaha</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_hasil_usaha_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_hasil_usaha_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_hasil_usaha_rencana - $apbDesa->pad_hasil_usaha_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Hasil Aset</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_hasil_aset_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_hasil_aset_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_hasil_aset_rencana - $apbDesa->pad_hasil_aset_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Swadaya, Partisipasi, Gotong Royong</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_swadaya_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_swadaya_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pad_swadaya_rencana - $apbDesa->pad_swadaya_realisasi) }}</td>
                            </tr>
                            
                            <tr class="bg-blue-100">
                                <td colspan="4" class="border border-gray-300 px-4 py-2 font-semibold">PENDAPATAN TRANSFER</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Dana Desa</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_dana_desa_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_dana_desa_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_dana_desa_rencana - $apbDesa->transfer_dana_desa_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Bagi Hasil Pajak & Retribusi</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bagi_hasil_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bagi_hasil_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bagi_hasil_rencana - $apbDesa->transfer_bagi_hasil_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Alokasi Dana Desa</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_alokasi_dana_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_alokasi_dana_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_alokasi_dana_rencana - $apbDesa->transfer_alokasi_dana_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Bantuan Keuangan Kabupaten</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bantuan_kab_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bantuan_kab_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bantuan_kab_rencana - $apbDesa->transfer_bantuan_kab_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Bantuan Keuangan Provinsi</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bantuan_prov_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bantuan_prov_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->transfer_bantuan_prov_rencana - $apbDesa->transfer_bantuan_prov_realisasi) }}</td>
                            </tr>
                            
                            <tr class="bg-blue-100">
                                <td colspan="4" class="border border-gray-300 px-4 py-2 font-semibold">PENDAPATAN LAIN-LAIN</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Hibah</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_hibah_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_hibah_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_hibah_rencana - $apbDesa->lain_hibah_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Sumbangan Pihak ketiga</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_sumbangan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_sumbangan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_sumbangan_rencana - $apbDesa->lain_sumbangan_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Pendapatan Lain-lain</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_pendapatan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_pendapatan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->lain_pendapatan_rencana - $apbDesa->lain_pendapatan_realisasi) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 2. Belanja Desa -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">2. Belanja Desa</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 text-sm">
                        <thead>
                            <tr class="bg-green-600 text-white">
                                <th class="border border-gray-300 px-4 py-3 text-left"></th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Rencana / Anggaran</th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Realisasi</th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Lebih/Kurang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Penyelenggaraan Pemerintahan Desa</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pemerintahan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pemerintahan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pemerintahan_rencana - $apbDesa->belanja_pemerintahan_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Pelaksanaan Pembangunan Desa</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pembangunan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pembangunan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pembangunan_rencana - $apbDesa->belanja_pembangunan_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Pembinaan Kemasyarakatan Desa</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_kemasyarakatan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_kemasyarakatan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_kemasyarakatan_rencana - $apbDesa->belanja_kemasyarakatan_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Pemberdayaan Masyarakat Desa</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pemberdayaan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pemberdayaan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_pemberdayaan_rencana - $apbDesa->belanja_pemberdayaan_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Belanja Tak Terduga</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_tak_terduga_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_tak_terduga_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->belanja_tak_terduga_rencana - $apbDesa->belanja_tak_terduga_realisasi) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 3. Pembiayaan Desa -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">3. Pembiayaan Desa</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 text-sm">
                        <thead>
                            <tr class="bg-purple-600 text-white">
                                <th class="border border-gray-300 px-4 py-3 text-left"></th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Rencana / Anggaran</th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Realisasi</th>
                                <th class="border border-gray-300 px-4 py-3 text-right">Lebih/Kurang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-purple-100">
                                <td colspan="4" class="border border-gray-300 px-4 py-2 font-semibold">PENERIMAAN PEMBIAYAAN</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">SiLPA</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_silpa_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_silpa_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_silpa_rencana - $apbDesa->penerimaan_silpa_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Pencairan Dana Cadangan</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_dana_cadangan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_dana_cadangan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_dana_cadangan_rencana - $apbDesa->penerimaan_dana_cadangan_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Hasil penjualan kekayaan Desa yang dipisahkan</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_hasil_penjualan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_hasil_penjualan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->penerimaan_hasil_penjualan_rencana - $apbDesa->penerimaan_hasil_penjualan_realisasi) }}</td>
                            </tr>
                            
                            <tr class="bg-purple-100">
                                <td colspan="4" class="border border-gray-300 px-4 py-2 font-semibold">PENGELUARAN PEMBIAYAAN</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Pembentukan Dana Cadangan</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pengeluaran_dana_cadangan_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pengeluaran_dana_cadangan_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pengeluaran_dana_cadangan_rencana - $apbDesa->pengeluaran_dana_cadangan_realisasi) }}</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Penyertaan Modal Desa</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pengeluaran_modal_desa_rencana) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pengeluaran_modal_desa_realisasi) }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-right">{{ $apbDesa->formatRupiah($apbDesa->pengeluaran_modal_desa_rencana - $apbDesa->pengeluaran_modal_desa_realisasi) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection