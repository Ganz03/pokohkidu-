<?php

namespace Database\Seeders;

use App\Models\KiaService;
use Illuminate\Database\Seeder;

class KiaServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'KIA Baru',
                'slug' => 'kia-baru',
                'description' => 'Pembuatan Kartu Identitas Anak baru untuk anak usia 0-17 tahun yang belum memiliki KIA.',
                'requirements' => "Surat Pengantar dari RT/RW\nAkte Kelahiran Anak (Asli dan Fotokopi)\nKartu Keluarga (KK) Asli\nKTP Orang Tua/Wali (Asli dan Fotokopi)\nSurat Nikah Orang Tua (Asli dan Fotokopi)\nPas foto anak 2x3 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'KIA Perubahan Data',
                'slug' => 'kia-perubahan-data',
                'description' => 'Perubahan data pada KIA karena ada perubahan informasi anak atau orang tua/wali.',
                'requirements' => "KIA Lama (Asli)\nSurat Pengantar dari RT/RW\nAkte Kelahiran Anak (Asli dan Fotokopi)\nKartu Keluarga (KK) Asli\nKTP Orang Tua/Wali (Asli dan Fotokopi)\nDokumen pendukung perubahan (Ijazah, SK, dll)\nPas foto anak 2x3 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'KIA Hilang',
                'slug' => 'kia-hilang',
                'description' => 'Penggantian KIA yang hilang atau dicuri dengan data yang sama.',
                'requirements' => "Surat Pengantar dari RT/RW\nSurat Keterangan Kehilangan dari Kepolisian\nAkte Kelahiran Anak (Asli dan Fotokopi)\nKartu Keluarga (KK) Asli\nKTP Orang Tua/Wali (Asli dan Fotokopi)\nPas foto anak 2x3 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'KIA Rusak',
                'slug' => 'kia-rusak',
                'description' => 'Penggantian KIA yang rusak, robek, luntur, atau tidak terbaca karena kerusakan fisik.',
                'requirements' => "KIA Lama yang Rusak\nSurat Pengantar dari RT/RW\nAkte Kelahiran Anak (Asli dan Fotokopi)\nKartu Keluarga (KK) Asli\nKTP Orang Tua/Wali (Asli dan Fotokopi)\nPas foto anak 2x3 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            KiaService::create($service);
        }
    }
}
