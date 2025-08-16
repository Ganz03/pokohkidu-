<?php

namespace Database\Seeders;

use App\Models\KkService;
use Illuminate\Database\Seeder;

class KkServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'KK Baru',
                'slug' => 'kk-baru',
                'description' => 'Pembuatan Kartu Keluarga baru untuk keluarga yang baru terbentuk atau belum memiliki KK.',
                'requirements' => "Surat Pengantar dari RT/RW\nFotokopi KTP Suami dan Istri\nSurat Nikah (Asli dan Fotokopi)\nSurat Keterangan Pindah (jika ada)\nPas foto 3x4 (2 lembar)",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'KK Perubahan',
                'slug' => 'kk-perubahan',
                'description' => 'Perubahan data pada Kartu Keluarga yang sudah ada karena ada perubahan status, pekerjaan, atau data lainnya.',
                'requirements' => "KK Lama (Asli)\nSurat Pengantar dari RT/RW\nFotokopi KTP yang mengalami perubahan\nDokumen pendukung perubahan (Surat Nikah, Ijazah, dll)\nPas foto 3x4 (2 lembar)",
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'KK Penambahan Anggota',
                'slug' => 'kk-penambahan-anggota',
                'description' => 'Penambahan anggota keluarga baru ke dalam Kartu Keluarga yang sudah ada.',
                'requirements' => "KK Lama (Asli)\nSurat Pengantar dari RT/RW\nAkte Kelahiran (untuk bayi baru lahir)\nSurat Keterangan Pindah (untuk anggota dari luar daerah)\nFotokopi KTP anggota baru (jika sudah 17 tahun)\nPas foto 3x4 (2 lembar)",
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'KK Pengurangan Anggota',
                'slug' => 'kk-pengurangan-anggota',
                'description' => 'Pengurangan anggota keluarga dari Kartu Keluarga karena meninggal dunia, pindah, atau pisah KK.',
                'requirements' => "KK Lama (Asli)\nSurat Pengantar dari RT/RW\nSurat Kematian (jika meninggal dunia)\nSurat Keterangan Pindah (jika pindah)\nSurat Pernyataan Pisah KK (jika pisah KK)\nPas foto 3x4 (2 lembar)",
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'KK Hilang',
                'slug' => 'kk-hilang',
                'description' => 'Penggantian Kartu Keluarga yang hilang atau rusak dengan data yang sama.',
                'requirements' => "Surat Pengantar dari RT/RW\nSurat Keterangan Kehilangan dari Kepolisian\nFotokopi KTP Kepala Keluarga\nFotokopi KTP seluruh anggota keluarga\nPas foto 3x4 (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'KK Rusak',
                'slug' => 'kk-rusak',
                'description' => 'Penggantian Kartu Keluarga yang rusak, robek, atau tidak terbaca.',
                'requirements' => "KK Lama yang Rusak\nSurat Pengantar dari RT/RW\nFotokopi KTP Kepala Keluarga\nFotokopi KTP seluruh anggota keluarga\nPas foto 3x4 (2 lembar)",
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'KK Penambahan Anggota OA',
                'slug' => 'kk-penambahan-anggota-oa',
                'description' => 'Penambahan anggota keluarga Orang Asing (WNA) ke dalam Kartu Keluarga.',
                'requirements' => "KK Lama (Asli)\nSurat Pengantar dari RT/RW\nPaspor dan Visa (Asli dan Fotokopi)\nKartu Izin Tinggal Terbatas/Tetap\nSurat Nikah (jika menikah dengan WNI)\nAkte Kelahiran (jika anak)\nPas foto 3x4 (2 lembar)",
                'sort_order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            KkService::create($service);
        }
    }
}
