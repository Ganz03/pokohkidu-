<?php

namespace Database\Seeders;

use App\Models\PindahDatangService;
use Illuminate\Database\Seeder;

class PindahDatangServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'SKPWNI Antar Kab/Prov',
                'slug' => 'skpwni-antar-kab-prov',
                'description' => 'Surat Keterangan Pindah WNI (Warga Negara Indonesia) untuk perpindahan antar kabupaten atau provinsi.',
                'requirements' => "Surat Pengantar dari RT/RW\nKartu Keluarga (KK) Asli\nKTP Asli yang akan pindah\nSurat Keterangan Catatan Kepolisian (SKCK)\nSurat Keterangan Sehat dari Puskesmas\nSurat Keterangan Tidak Mampu (jika ada)\nPas foto 3x4 (4 lembar)\nAlasan kepindahan (Surat Keterangan Kerja/Sekolah/dll)",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'SKDWNI Antar Kab/Prov',
                'slug' => 'skdwni-antar-kab-prov',
                'description' => 'Surat Keterangan Datang WNI untuk pendatang dari kabupaten atau provinsi lain.',
                'requirements' => "Surat Pengantar dari RT/RW\nSurat Keterangan Pindah dari daerah asal\nKartu Keluarga (KK) Asli\nKTP Asli\nSurat Keterangan Sehat dari Puskesmas\nSurat Keterangan Kelakuan Baik dari Kepolisian\nPas foto 3x4 (4 lembar)\nSurat Keterangan Kerja/Sekolah (jika ada)",
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'SKTT WNA',
                'slug' => 'sktt-wna',
                'description' => 'Surat Keterangan Tinggal Tetap untuk Warga Negara Asing yang berdomisili di wilayah desa.',
                'requirements' => "Surat Pengantar dari RT/RW\nPaspor Asli dan Fotokopi\nVisa Tinggal Asli dan Fotokopi\nKartu Izin Tinggal Terbatas/Tetap\nSurat Keterangan Sehat dari Puskesmas\nSurat Keterangan Kelakuan Baik dari Kepolisian\nSurat Sponsor dari Penjamin (jika ada)\nPas foto 4x6 (4 lembar)",
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Penduduk Tercecer',
                'slug' => 'penduduk-tercecer',
                'description' => 'Layanan untuk penduduk yang tercecer atau kehilangan dokumen kependudukan akibat bencana alam atau keadaan darurat.',
                'requirements' => "Surat Pengantar dari RT/RW\nSurat Keterangan dari Kepala Desa asal\nSurat Keterangan Kehilangan dari Kepolisian\nSurat Keterangan Saksi (minimal 2 orang)\nSurat Keterangan Sehat dari Puskesmas\nPas foto 3x4 (6 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'SKPWNI Antar Kecamatan',
                'slug' => 'skpwni-antar-kecamatan',
                'description' => 'Surat Keterangan Pindah WNI untuk perpindahan dalam satu kabupaten tetapi beda kecamatan.',
                'requirements' => "Surat Pengantar dari RT/RW\nKartu Keluarga (KK) Asli\nKTP Asli yang akan pindah\nSurat Keterangan Sehat dari Puskesmas\nPas foto 3x4 (2 lembar)\nAlasan kepindahan (Surat Keterangan Kerja/Sekolah/dll)",
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'SKPWNI Antar Desa/Kel',
                'slug' => 'skpwni-antar-desa-kel',
                'description' => 'Surat Keterangan Pindah WNI untuk perpindahan antar desa atau kelurahan dalam satu kecamatan.',
                'requirements' => "Surat Pengantar dari RT/RW\nKartu Keluarga (KK) Asli\nKTP Asli yang akan pindah\nPas foto 3x4 (2 lembar)\nAlasan kepindahan",
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'SKDWNI Antar Kecamatan',
                'slug' => 'skdwni-antar-kecamatan',
                'description' => 'Surat Keterangan Datang WNI untuk pendatang dari kecamatan lain dalam satu kabupaten.',
                'requirements' => "Surat Pengantar dari RT/RW\nSurat Keterangan Pindah dari desa asal\nKartu Keluarga (KK) Asli\nKTP Asli\nPas foto 3x4 (2 lembar)",
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'SKDWNI Antar Desa/Kel',
                'slug' => 'skdwni-antar-desa-kel',
                'description' => 'Surat Keterangan Datang WNI untuk pendatang dari desa atau kelurahan lain dalam satu kecamatan.',
                'requirements' => "Surat Pengantar dari RT/RW\nSurat Keterangan Pindah dari desa asal\nKartu Keluarga (KK) Asli\nKTP Asli\nPas foto 3x4 (2 lembar)",
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            PindahDatangService::create($service);
        }
    }
}
