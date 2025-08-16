<?php
// database/seeders/PerangkatDesaSeeder.php
namespace Database\Seeders;

use App\Models\PerangkatDesa;
use Illuminate\Database\Seeder;

class PerangkatDesaSeeder extends Seeder
{
    public function run()
    {
        $perangkatDesa = [
            [
                'nama_jabatan' => 'Kepala Desa',
                'nama_pejabat' => 'WURYATNO',
                'tugas_fungsi' => 'Kepala Desa berkedudukan sebagai Kepala Pemerintahan Desa yang memimpin penyelenggaraan Pemerintahan Desa. Kepala Desa bertugas menyelenggarakan Pemerintahan Desa, melaksanakan pembangunan Desa, pembinaan kemasyarakatan Desa, dan pemberdayaan masyarakat Desa.',
                'wewenang' => 'memimpin penyelenggaraan Pemerintahan Desa; mengangkat dan memberhentikan Perangkat Desa; memegang kekuasaan pengelolaan Keuangan dan Aset Desa; menetapkan Peraturan Desa; menetapkan APB Desa',
                'hak' => 'mengusulkan struktur organisasi dan tata kerja Pemerintah Desa; mengajukan rancangan dan menetapkan Peraturan Desa; menerima penghasilan tetap setiap bulan, tunjangan, dan penerimaan lainnya yang sah serta mendapat jaminan kesehatan',
                'kewajiban' => 'memegang teguh dan mengamalkan Pancasila; meningkatkan kesejahteraan masyarakat Desa; memelihara ketenteraman dan ketertiban masyarakat Desa; mentaati dan menegakkan peraturan perundang-undangan',
                'urutan_tampil' => 1,
            ],
            [
                'nama_jabatan' => 'Sekretaris Desa',
                'nama_pejabat' => 'AGUS RIYADI',
                'tugas_fungsi' => 'Sekretaris Desa berkedudukan sebagai unsur staf yang membantu Kepala Desa dalam bidang administrasi pemerintahan.',
                'urutan_tampil' => 2,
            ],
            [
                'nama_jabatan' => 'Kaur Umum dan Perencanaan',
                'nama_pejabat' => 'BHARSELA SAGITANINGTY',
                'tugas_fungsi' => 'Kepala Urusan Umum dan Perencanaan bertugas membantu Sekretaris Desa dalam urusan pelayanan administrasi pendukung pelaksanaan tugas-tugas pemerintahan.',
                'urutan_tampil' => 3,
            ],
            [
                'nama_jabatan' => 'Kaur Keuangan',
                'nama_pejabat' => 'MARTISA KIRANA PUTRI',
                'tugas_fungsi' => 'Kepala Urusan Keuangan bertugas membantu Sekretaris Desa dalam urusan administrasi keuangan.',
                'urutan_tampil' => 4,
            ],
            [
                'nama_jabatan' => 'Kasi Pemerintahan',
                'nama_pejabat' => 'ARIS AGUNG SETIA NUGRAHA',
                'tugas_fungsi' => 'Kepala Seksi Pemerintahan bertugas membantu Kepala Desa sebagai pelaksana tugas operasional.',
                'urutan_tampil' => 5,
            ],
            [
                'nama_jabatan' => 'Kasi Pelayanan',
                'nama_pejabat' => 'SUDARSIH',
                'tugas_fungsi' => 'Kepala Seksi Pelayanan bertugas membantu Kepala Desa sebagai pelaksana tugas operasional.',
                'urutan_tampil' => 6,
            ],
        ];

        foreach ($perangkatDesa as $perangkat) {
            PerangkatDesa::create($perangkat);
        }
    }
}