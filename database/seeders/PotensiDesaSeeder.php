<?php

namespace Database\Seeders;

use App\Models\PotensiDesa;
use Illuminate\Database\Seeder;

class PotensiDesaSeeder extends Seeder
{
    public function run(): void
    {
        $potensiDesa = [
            [
                'tahun' => 2025,
                'jumlah_penduduk_laki' => 1250,
                'jumlah_penduduk_perempuan' => 1180,
                'jumlah_kepala_keluarga' => 685,
                'kepadatan_penduduk' => 145.50,
                'luas_wilayah' => 16.75,
                'batas_wilayah_utara' => 'Desa Wonogiri Kecamatan Wonogiri',
                'batas_wilayah_selatan' => 'Desa Giriwono Kecamatan Wonogiri',
                'batas_wilayah_timur' => 'Desa Pokoh Wetan Kecamatan Wonogiri',
                'batas_wilayah_barat' => 'Desa Wonokarto Kecamatan Wonogiri',
                'orbitasi_desa' => 'Jarak ke ibu kota kecamatan 3 km, jarak ke ibu kota kabupaten 5 km, jarak ke ibu kota provinsi 125 km',
                'jenis_lahan' => [
                    ['nama' => 'Persawahan', 'luas' => 450.75],
                    ['nama' => 'Perkebunan', 'luas' => 325.50],
                    ['nama' => 'Pemukiman', 'luas' => 280.25],
                    ['nama' => 'Fasilitas Umum', 'luas' => 125.00],
                    ['nama' => 'Hutan', 'luas' => 495.50],
                ],
                'potensi_wisata' => 'Wisata alam pegunungan, wisata air terjun, dan wisata agro perkebunan',
                'kantor_desa' => 'Kantor Desa Pokoh Kidul terletak di Jl. Raya Pokoh Kidul dengan kondisi baik dan memadai',
                'lembaga_pemerintahan' => [
                    ['nama' => 'BPD (Badan Permusyawaratan Desa)', 'keterangan' => 'Aktif dengan 9 anggota'],
                    ['nama' => 'LPMD (Lembaga Pemberdayaan Masyarakat Desa)', 'keterangan' => 'Aktif koordinasi pembangunan'],
                    ['nama' => 'Karang Taruna', 'keterangan' => 'Aktif dengan 25 anggota pemuda'],
                ],
                'sarana_prasarana_pkk' => [
                    ['nama' => 'Kelompok PKK', 'jumlah' => 8, 'keterangan' => 'Aktif di setiap RT'],
                    ['nama' => 'Posyandu', 'jumlah' => 6, 'keterangan' => 'Melayani balita dan lansia'],
                    ['nama' => 'PAUD', 'jumlah' => 3, 'keterangan' => 'Pendidikan anak usia dini'],
                ],
                'sarana_prasarana_pendidikan' => [
                    ['nama' => 'TK/PAUD', 'jumlah' => 3, 'keterangan' => 'Swasta dan negeri'],
                    ['nama' => 'SD/MI', 'jumlah' => 2, 'keterangan' => 'SD Negeri dan MI'],
                    ['nama' => 'SMP/MTs', 'jumlah' => 1, 'keterangan' => 'SMP Negeri'],
                    ['nama' => 'Perpustakaan Desa', 'jumlah' => 1, 'keterangan' => 'Koleksi 500 buku'],
                ],
                'sarana_prasarana_peribadatan' => [
                    ['nama' => 'Masjid', 'jumlah' => 8, 'keterangan' => 'Masjid jami dan masjid RT'],
                    ['nama' => 'Mushola', 'jumlah' => 12, 'keterangan' => 'Tersebar di setiap dusun'],
                    ['nama' => 'Gereja', 'jumlah' => 1, 'keterangan' => 'Gereja Kristen'],
                ],
                'sarana_prasarana_kesehatan' => [
                    ['nama' => 'Puskesmas Pembantu', 'jumlah' => 1, 'keterangan' => 'Pelayanan kesehatan dasar'],
                    ['nama' => 'Posyandu', 'jumlah' => 6, 'keterangan' => 'Balita dan lansia'],
                    ['nama' => 'Bidan Desa', 'jumlah' => 2, 'keterangan' => 'Siaga 24 jam'],
                    ['nama' => 'Apotek/Toko Obat', 'jumlah' => 3, 'keterangan' => 'Obat-obatan dasar'],
                ],
                'sarana_prasarana_air_bersih' => [
                    ['nama' => 'Sumur Bor', 'jumlah' => 15, 'keterangan' => 'Sumur dalam untuk MCK'],
                    ['nama' => 'PDAM', 'jumlah' => 450, 'keterangan' => 'Sambungan rumah'],
                    ['nama' => 'Sumur Gali', 'jumlah' => 85, 'keterangan' => 'Sumur tradisional'],
                ],
                'sarana_prasarana_irigasi' => [
                    ['nama' => 'Saluran Primer', 'jumlah' => 2, 'keterangan' => 'Panjang total 3.5 km'],
                    ['nama' => 'Saluran Sekunder', 'jumlah' => 8, 'keterangan' => 'Panjang total 12 km'],
                ],
                'is_active' => true,
            ],
        ];

        foreach ($potensiDesa as $data) {
            PotensiDesa::create($data);
        }
    }
}
