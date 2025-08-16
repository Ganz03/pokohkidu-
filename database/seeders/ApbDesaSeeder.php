<?php

namespace Database\Seeders;

use App\Models\ApbDesa;
use Illuminate\Database\Seeder;

class ApbDesaSeeder extends Seeder
{
    public function run(): void
    {
        $apbDesas = [
            [
                'judul' => 'LAPORAN PERTANGGUNGJAWABAN APBDES 2024 - Tahun 2024',
                'slug' => 'laporan-pertanggungjawaban-apbdes-2024',
                'excerpt' => 'Laporan Pertanggungjawaban APBDes 2024',
                'tahun' => 2024,
                'tanggal_publikasi' => '2025-01-16',
                
                // Pendapatan Asli Desa
                'pad_hasil_usaha_rencana' => 1759550,
                'pad_hasil_usaha_realisasi' => 0,
                'pad_hasil_aset_rencana' => 77180000,
                'pad_hasil_aset_realisasi' => 0,
                'pad_swadaya_rencana' => 0,
                'pad_swadaya_realisasi' => 0,
                
                // Pendapatan Transfer
                'transfer_dana_desa_rencana' => 1230818000,
                'transfer_dana_desa_realisasi' => 0,
                'transfer_bagi_hasil_rencana' => 36029000,
                'transfer_bagi_hasil_realisasi' => 0,
                'transfer_alokasi_dana_rencana' => 649968000,
                'transfer_alokasi_dana_realisasi' => 0,
                'transfer_bantuan_kab_rencana' => 0,
                'transfer_bantuan_kab_realisasi' => 0,
                'transfer_bantuan_prov_rencana' => 0,
                'transfer_bantuan_prov_realisasi' => 0,
                
                // Pendapatan Lain-lain
                'lain_hibah_rencana' => 0,
                'lain_hibah_realisasi' => 0,
                'lain_sumbangan_rencana' => 0,
                'lain_sumbangan_realisasi' => 0,
                'lain_pendapatan_rencana' => 1200000,
                'lain_pendapatan_realisasi' => 0,
                
                // Belanja Desa
                'belanja_pemerintahan_rencana' => 1072984369,
                'belanja_pemerintahan_realisasi' => 0,
                'belanja_pembangunan_rencana' => 762885000,
                'belanja_pembangunan_realisasi' => 0,
                'belanja_kemasyarakatan_rencana' => 108600000,
                'belanja_kemasyarakatan_realisasi' => 0,
                'belanja_pemberdayaan_rencana' => 60425000,
                'belanja_pemberdayaan_realisasi' => 0,
                'belanja_tak_terduga_rencana' => 62098000,
                'belanja_tak_terduga_realisasi' => 0,
                
                // Pembiayaan Desa
                'penerimaan_silpa_rencana' => 80037819,
                'penerimaan_silpa_realisasi' => 0,
                'penerimaan_dana_cadangan_rencana' => 0,
                'penerimaan_dana_cadangan_realisasi' => 0,
                'penerimaan_hasil_penjualan_rencana' => 0,
                'penerimaan_hasil_penjualan_realisasi' => 0,
                'pengeluaran_dana_cadangan_rencana' => 0,
                'pengeluaran_dana_cadangan_realisasi' => 0,
                'pengeluaran_modal_desa_rencana' => 10000000,
                'pengeluaran_modal_desa_realisasi' => 0,
                
                'is_published' => true,
            ],
            [
                'judul' => 'ANGGARAN PENDAPATAN DAN BELANJA DESA POKOH KIDUL - Tahun 2024',
                'slug' => 'anggaran-pendapatan-dan-belanja-desa-pokoh-kidul-tahun-2024',
                'excerpt' => 'Anggaran Pendapatan dan Belanja Desa Pokoh Kidul Tahun Anggaran 2024',
                'tahun' => 2024,
                'tanggal_publikasi' => '2025-01-13',
                
                // Data untuk tahun 2024 yang berbeda
                'pad_hasil_usaha_rencana' => 2000000,
                'pad_hasil_usaha_realisasi' => 1800000,
                'pad_hasil_aset_rencana' => 80000000,
                'pad_hasil_aset_realisasi' => 75000000,
                'pad_swadaya_rencana' => 5000000,
                'pad_swadaya_realisasi' => 4500000,
                
                'transfer_dana_desa_rencana' => 1250000000,
                'transfer_dana_desa_realisasi' => 1200000000,
                'transfer_bagi_hasil_rencana' => 40000000,
                'transfer_bagi_hasil_realisasi' => 38000000,
                'transfer_alokasi_dana_rencana' => 650000000,
                'transfer_alokasi_dana_realisasi' => 630000000,
                'transfer_bantuan_kab_rencana' => 50000000,
                'transfer_bantuan_kab_realisasi' => 50000000,
                'transfer_bantuan_prov_rencana' => 25000000,
                'transfer_bantuan_prov_realisasi' => 25000000,
                
                'lain_hibah_rencana' => 10000000,
                'lain_hibah_realisasi' => 8000000,
                'lain_sumbangan_rencana' => 5000000,
                'lain_sumbangan_realisasi' => 3000000,
                'lain_pendapatan_rencana' => 2000000,
                'lain_pendapatan_realisasi' => 1500000,
                
                'belanja_pemerintahan_rencana' => 1100000000,
                'belanja_pemerintahan_realisasi' => 1050000000,
                'belanja_pembangunan_rencana' => 800000000,
                'belanja_pembangunan_realisasi' => 750000000,
                'belanja_kemasyarakatan_rencana' => 120000000,
                'belanja_kemasyarakatan_realisasi' => 110000000,
                'belanja_pemberdayaan_rencana' => 70000000,
                'belanja_pemberdayaan_realisasi' => 65000000,
                'belanja_tak_terduga_rencana' => 80000000,
                'belanja_tak_terduga_realisasi' => 20000000,
                
                'penerimaan_silpa_rencana' => 90000000,
                'penerimaan_silpa_realisasi' => 90000000,
                'penerimaan_dana_cadangan_rencana' => 0,
                'penerimaan_dana_cadangan_realisasi' => 0,
                'penerimaan_hasil_penjualan_rencana' => 0,
                'penerimaan_hasil_penjualan_realisasi' => 0,
                'pengeluaran_dana_cadangan_rencana' => 15000000,
                'pengeluaran_dana_cadangan_realisasi' => 10000000,
                'pengeluaran_modal_desa_rencana' => 12000000,
                'pengeluaran_modal_desa_realisasi' => 12000000,
                
                'is_published' => true,
            ],
            [
                'judul' => 'LAPORAN REALISASI APBDES POKOH KIDUL TAHUN ANGGARAN 2023 - Tahun 2023',
                'slug' => 'laporan-realisasi-apbdes-pokoh-kidul-tahun-anggaran-2023',
                'excerpt' => 'Laporan Realisasi APBDes Pokoh Kidul Tahun Anggaran 2023',
                'tahun' => 2023,
                'tanggal_publikasi' => '2024-01-13',
                
                // Data tahun 2023 
                'pad_hasil_usaha_rencana' => 1500000,
                'pad_hasil_usaha_realisasi' => 1450000,
                'pad_hasil_aset_rencana' => 70000000,
                'pad_hasil_aset_realisasi' => 68000000,
                'pad_swadaya_rencana' => 3000000,
                'pad_swadaya_realisasi' => 2800000,
                
                'transfer_dana_desa_rencana' => 1150000000,
                'transfer_dana_desa_realisasi' => 1140000000,
                'transfer_bagi_hasil_rencana' => 35000000,
                'transfer_bagi_hasil_realisasi' => 34000000,
                'transfer_alokasi_dana_rencana' => 600000000,
                'transfer_alokasi_dana_realisasi' => 595000000,
                'transfer_bantuan_kab_rencana' => 45000000,
                'transfer_bantuan_kab_realisasi' => 45000000,
                'transfer_bantuan_prov_rencana' => 20000000,
                'transfer_bantuan_prov_realisasi' => 20000000,
                
                'lain_hibah_rencana' => 8000000,
                'lain_hibah_realisasi' => 7500000,
                'lain_sumbangan_rencana' => 3000000,
                'lain_sumbangan_realisasi' => 2500000,
                'lain_pendapatan_rencana' => 1500000,
                'lain_pendapatan_realisasi' => 1400000,
                
                'belanja_pemerintahan_rencana' => 1000000000,
                'belanja_pemerintahan_realisasi' => 980000000,
                'belanja_pembangunan_rencana' => 750000000,
                'belanja_pembangunan_realisasi' => 720000000,
                'belanja_kemasyarakatan_rencana' => 100000000,
                'belanja_kemasyarakatan_realisasi' => 95000000,
                'belanja_pemberdayaan_rencana' => 60000000,
                'belanja_pemberdayaan_realisasi' => 58000000,
                'belanja_tak_terduga_rencana' => 50000000,
                'belanja_tak_terduga_realisasi' => 15000000,
                
                'penerimaan_silpa_rencana' => 75000000,
                'penerimaan_silpa_realisasi' => 75000000,
                'penerimaan_dana_cadangan_rencana' => 0,
                'penerimaan_dana_cadangan_realisasi' => 0,
                'penerimaan_hasil_penjualan_rencana' => 0,
                'penerimaan_hasil_penjualan_realisasi' => 0,
                'pengeluaran_dana_cadangan_rencana' => 10000000,
                'pengeluaran_dana_cadangan_realisasi' => 8000000,
                'pengeluaran_modal_desa_rencana' => 10000000,
                'pengeluaran_modal_desa_realisasi' => 10000000,
                
                'is_published' => true,
            ],
        ];

        foreach ($apbDesas as $apbDesa) {
            ApbDesa::create($apbDesa);
        }
    }
}

