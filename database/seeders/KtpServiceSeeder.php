<?php

namespace Database\Seeders;

use App\Models\KtpService;
use Illuminate\Database\Seeder;

class KtpServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'KTP Baru',
                'slug' => 'ktp-baru',
                'description' => 'Pembuatan KTP baru untuk WNI yang baru berusia 17 tahun atau sudah menikah dan belum memiliki KTP.',
                'requirements' => "Surat Pengantar dari RT/RW\nFotokopi Kartu Keluarga (KK)\nAkte Kelahiran (Asli dan Fotokopi)\nSurat Keterangan Catatan Sipil (untuk yang sudah menikah)\nPas foto 3x4 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'KTP Perubahan',
                'slug' => 'ktp-perubahan',
                'description' => 'Perubahan data pada KTP yang sudah ada karena ada perubahan status perkawinan, pekerjaan, pendidikan, atau data lainnya.',
                'requirements' => "KTP Lama (Asli)\nSurat Pengantar dari RT/RW\nFotokopi Kartu Keluarga (KK)\nDokumen pendukung perubahan (Surat Nikah, Ijazah, SK Kerja, dll)\nPas foto 3x4 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'KTP Hilang',
                'slug' => 'ktp-hilang',
                'description' => 'Penggantian KTP yang hilang atau dicuri dengan data yang sama.',
                'requirements' => "Surat Pengantar dari RT/RW\nSurat Keterangan Kehilangan dari Kepolisian\nFotokopi Kartu Keluarga (KK)\nAkte Kelahiran (Fotokopi)\nPas foto 3x4 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'KTP Rusak',
                'slug' => 'ktp-rusak',
                'description' => 'Penggantian KTP yang rusak, robek, luntur, atau tidak terbaca karena kerusakan fisik.',
                'requirements' => "KTP Lama yang Rusak\nSurat Pengantar dari RT/RW\nFotokopi Kartu Keluarga (KK)\nAkte Kelahiran (Fotokopi)\nPas foto 3x4 background merah (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            KtpService::create($service);
        }
    }
}