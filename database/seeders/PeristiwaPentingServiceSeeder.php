<?php

namespace Database\Seeders;

use App\Models\PeristiwaPentingService;
use Illuminate\Database\Seeder;

class PeristiwaPentingServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Akta Kelahiran',
                'slug' => 'akta-kelahiran',
                'description' => 'Pembuatan akta kelahiran untuk bayi yang baru lahir atau belum memiliki akta kelahiran.',
                'requirements' => "Surat Keterangan Lahir dari Bidan/Dokter/Rumah Sakit\nSurat Pengantar dari RT/RW\nKartu Keluarga (KK) Orang Tua\nKTP Ayah dan Ibu (Asli dan Fotokopi)\nSurat Nikah Orang Tua (Asli dan Fotokopi)\nSurat Keterangan Saksi Kelahiran (2 orang)\nPas foto Ayah dan Ibu 3x4 (masing-masing 2 lembar)",
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Akta Kematian',
                'slug' => 'akta-kematian',
                'description' => 'Pembuatan akta kematian untuk yang telah meninggal dunia sebagai bukti legal kematian.',
                'requirements' => "Surat Keterangan Kematian dari Dokter/Rumah Sakit\nSurat Pengantar dari RT/RW\nKartu Keluarga (KK) Almarhum\nKTP Almarhum (jika ada)\nKTP Pelapor (Asli dan Fotokopi)\nSurat Keterangan Saksi Kematian (2 orang)\nSurat Pemakaman dari TPU (jika ada)",
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Akta Perkawinan',
                'slug' => 'akta-perkawinan',
                'description' => 'Pembuatan akta perkawinan sebagai bukti sah pernikahan menurut hukum negara.',
                'requirements' => "Surat Pengantar dari RT/RW\nKTP Calon Suami dan Istri (Asli dan Fotokopi)\nKartu Keluarga (KK) masing-masing\nAkte Kelahiran Calon Suami dan Istri\nSurat Keterangan Belum Menikah dari Kelurahan\nSurat Keterangan Sehat dari Puskesmas\nPas foto Calon Suami dan Istri 3x4 (masing-masing 4 lembar)\nSurat Persetujuan Orang Tua (jika belum 21 tahun)",
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Akta Perceraian',
                'slug' => 'akta-perceraian',
                'description' => 'Pembuatan akta perceraian berdasarkan putusan pengadilan yang telah berkekuatan hukum tetap.',
                'requirements' => "Surat Pengantar dari RT/RW\nSalinan Putusan Pengadilan yang telah berkekuatan hukum tetap\nKTP Suami dan Istri (Asli dan Fotokopi)\nKartu Keluarga (KK)\nAkta Perkawinan (Asli dan Fotokopi)\nPas foto Suami dan Istri 3x4 (masing-masing 2 lembar)",
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Pengakuan Anak',
                'slug' => 'pengakuan-anak',
                'description' => 'Proses pengakuan anak oleh ayah biologis untuk anak yang lahir di luar perkawinan.',
                'requirements' => "Surat Pengantar dari RT/RW\nAkte Kelahiran Anak\nKTP Ayah yang mengakui (Asli dan Fotokopi)\nKTP Ibu Anak (Asli dan Fotokopi)\nKartu Keluarga (KK)\nSurat Pernyataan Pengakuan Anak bermaterai 10.000\nSurat Keterangan Saksi (2 orang)\nPas foto Ayah dan Ibu 3x4 (masing-masing 2 lembar)",
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Pengesahan Anak',
                'slug' => 'pengesahan-anak',
                'description' => 'Proses pengesahan anak yang lahir sebelum perkawinan orang tuanya yang sah.',
                'requirements' => "Surat Pengantar dari RT/RW\nAkte Kelahiran Anak\nAkta Perkawinan Orang Tua\nKTP Ayah dan Ibu (Asli dan Fotokopi)\nKartu Keluarga (KK)\nSurat Pernyataan Pengesahan Anak bermaterai 10.000\nPas foto Ayah dan Ibu 3x4 (masing-masing 2 lembar)",
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Pengangkatan Anak',
                'slug' => 'pengangkatan-anak',
                'description' => 'Proses pengangkatan anak berdasarkan penetapan pengadilan untuk menjadi anak sah.',
                'requirements' => "Surat Pengantar dari RT/RW\nSalinan Penetapan Pengadilan tentang Pengangkatan Anak\nAkte Kelahiran Anak\nKTP Orang Tua Angkat (Asli dan Fotokopi)\nKartu Keluarga (KK) Orang Tua Angkat\nSurat Persetujuan Orang Tua Kandung (jika masih hidup)\nSurat Keterangan Tidak Mampu Orang Tua Kandung (jika ada)\nPas foto Orang Tua Angkat 3x4 (masing-masing 2 lembar)",
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Perubahan Nama',
                'slug' => 'perubahan-nama',
                'description' => 'Proses perubahan nama dalam dokumen kependudukan berdasarkan penetapan pengadilan.',
                'requirements' => "Surat Pengantar dari RT/RW\nSalinan Penetapan Pengadilan tentang Perubahan Nama\nKTP Lama (Asli)\nKartu Keluarga (KK) Lama\nAkte Kelahiran Lama\nPas foto 3x4 background merah (4 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'Perubahan Kewarganegaraan',
                'slug' => 'perubahan-kewarganegaraan',
                'description' => 'Proses perubahan status kewarganegaraan berdasarkan keputusan yang sah.',
                'requirements' => "Surat Pengantar dari RT/RW\nKeputusan Menteri tentang Perubahan Kewarganegaraan\nPaspor Lama (jika WNA)\nKTP Lama (jika ada)\nKartu Keluarga (KK)\nAkte Kelahiran\nSurat Keterangan Sehat dari Puskesmas\nSurat Keterangan Kelakuan Baik dari Kepolisian\nPas foto 4x6 background merah (6 lembar)",
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'Pembetulan Akta',
                'slug' => 'pembetulan-akta',
                'description' => 'Proses pembetulan kesalahan data pada akta catatan sipil yang sudah diterbitkan.',
                'requirements' => "Surat Pengantar dari RT/RW\nAkta yang akan dibetulkan (Asli)\nDokumen pendukung yang benar\nKTP Pemohon (Asli dan Fotokopi)\nKartu Keluarga (KK)\nSurat Keterangan dari Instansi terkait\nPas foto 3x4 (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Pembatalan Akta',
                'slug' => 'pembatalan-akta',
                'description' => 'Proses pembatalan akta catatan sipil berdasarkan putusan pengadilan yang berkekuatan hukum tetap.',
                'requirements' => "Surat Pengantar dari RT/RW\nSalinan Putusan Pengadilan tentang Pembatalan\nAkta yang akan dibatalkan (Asli)\nKTP Pemohon (Asli dan Fotokopi)\nKartu Keluarga (KK)\nSurat Keterangan Saksi (2 orang)\nPas foto 3x4 (2 lembar)",
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'name' => 'Peristiwa Penting Lainnya',
                'slug' => 'peristiwa-penting-lainnya',
                'description' => 'Layanan untuk peristiwa penting lainnya yang tidak termasuk dalam kategori standar.',
                'requirements' => "Surat Pengantar dari RT/RW\nDokumen pendukung sesuai jenis peristiwa\nKTP Pemohon (Asli dan Fotokopi)\nKartu Keluarga (KK)\nSurat Keterangan dari Instansi terkait\nPas foto 3x4 (2 lembar)\nSurat Pernyataan bermaterai 10.000",
                'sort_order' => 12,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            PeristiwaPentingService::create($service);
        }
    }
}