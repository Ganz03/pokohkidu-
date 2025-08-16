<?php
// database/seeders/OrganizationPositionSeeder.php
namespace Database\Seeders;

use App\Models\OrganizationPosition;
use Illuminate\Database\Seeder;

class OrganizationPositionSeeder extends Seeder
{
    public function run()
    {
        $positions = [
            [
                'position_name' => 'Kepala Desa',
                'person_name' => 'WURYATNO',
                'duties' => 'Kepala Desa berkedudukan sebagai Kepala Pemerintahan Desa yang memimpin penyelenggaraan Pemerintahan Desa.

Kepala Desa bertugas menyelenggarakan Pemerintahan Desa, melaksanakan pembangunan Desa, pembinaan kemasyarakatan Desa, dan pemberdayaan masyarakat Desa.',
                'authorities' => 'memimpin penyelenggaraan Pemerintahan Desa
mengangkat dan memberhentikan Perangkat Desa
memegang kekuasaan pengelolaan Keuangan dan Aset Desa
menetapkan Peraturan Desa
menetapkan APB Desa
membina kehidupan masyarakat Desa
membina ketenteraman dan ketertiban masyarakat Desa
membina dan meningkatkan perekonomian desa serta mengintegrasikannya agar mencapai perekonomian skala produktif untuk sebesar besarnya kemakmuran masyarakat desa
mengembangkan sumber pendapatan desa
mengusulkan dan menerima pelimpahan sebagian kekayaan negara guna meningkatkan kesejahteraan masyarakat desa
mengembangkan kehidupan sosial masyarakat desa
mengembangkan dan membina kebudayaan masyarakat desa
memanfaatkan teknologi tepat guna
mengoordinasikan pembangunan desa secara partisipatif
mengadakan kerjasama dengan pihak lain sesuai peraturan perundang-undangan
mewakili Desa di dalam dan di luar pengadilan atau menunjuk kuasa hukum untuk mewakilinya sesuai dengan ketentuan peraturan perundang-undangan',
                'rights' => 'mengusulkan struktur organisasi dan tata kerja Pemerintah Desa
mengajukan rancangan dan menetapkan Peraturan Desa
menerima penghasilan tetap setiap bulan, tunjangan, dan penerimaan lainnya yang sah serta mendapat jaminan kesehatan
mendapatkan cuti
mendapatkan perlindungan hukum atas kebijakan yang dilaksanakan
memberikan mandat pelaksanaan tugas dan kewajiban lainnya kepada Perangkat Desa',
                'obligations' => 'memegang teguh dan mengamalkan Pancasila, melaksanakan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, serta mempertahankan dan memelihara keutuhan Negara Kesatuan Republik Indonesia, dan Bhinneka Tunggal Ika
meningkatkan kesejahteraan masyarakat Desa
memelihara ketenteraman dan ketertiban masyarakat Desa
mentaati dan menegakkan peraturan perundang-undangan
melaksanakan kehidupan demokrasi dan berkeadilan gender
melaksanakan prinsip tata Pemerintahan Desa yang akuntabel, transparan, professional, efektif dan efisien, bersih, serta bebas dari kolusi, korupsi dan nepotisme
menjalin kerja sama dan koordinasi dengan seluruh pemangku kepentingan di Desa
menyelenggarakan administrasi pemerintahan Desa yang baik
mengelola keuangan dan aset Desa
melaksanakan urusan pemerintahan yang menjadi kewenangan Desa
menyelesaikan perselisihan masyarakat di Desa
mengembangkan perekonomian masyarakat Desa
mengembangkan kehidupan sosial masyarakat desa
mengembangkan dan membina kebudayaan masyarakat desa
memberdayakan masyarakat dan lembaga kemasyarakatan di Desa
mengembangkan potensi sumber daya alam dan melestarikan lingkungan hidup
memberikan informasi kepada masyarakat Desa',
                'sort_order' => 1,
            ],
            [
                'position_name' => 'Sekretaris Desa',
                'person_name' => 'Nama Sekretaris Desa',
                'duties' => 'Sekretaris Desa berkedudukan sebagai unsur staf yang membantu Kepala Desa dalam bidang administrasi pemerintahan.

Sekretaris Desa bertugas membantu Kepala Desa dalam melaksanakan tugas dan kewenangannya, mengoordinasikan kegiatan-kegiatan yang dilaksanakan oleh perangkat desa lainnya.',
                'authorities' => 'mengoordinasikan kegiatan perangkat desa
mengoordinasikan penyusunan rencana anggaran pendapatan dan belanja desa
melaksanakan administrasi keuangan desa
melaksanakan administrasi umum
melaksanakan administrasi kependudukan',
                'rights' => 'mendapat penghasilan tetap dan tunjangan
mendapat jaminan kesehatan
mendapat cuti
mendapat perlindungan hukum',
                'obligations' => 'setia dan taat kepada Pancasila dan UUD 1945
melaksanakan tugas dengan penuh tanggung jawab
melayani masyarakat dengan baik
menjaga rahasia jabatan
bekerja dengan jujur dan adil',
                'sort_order' => 2,
            ],
            [
                'position_name' => 'Bendahara Desa',
                'person_name' => 'Nama Bendahara Desa',
                'duties' => 'Bendahara Desa bertugas mengelola keuangan dan aset desa sesuai dengan ketentuan yang berlaku.

Bendahara Desa bertanggung jawab atas pengelolaan keuangan desa yang meliputi perencanaan, pelaksanaan, penatausahaan, pelaporan, dan pertanggungjawaban.',
                'authorities' => 'mengelola keuangan desa
melakukan pembayaran berdasarkan SPP
melakukan pungutan retribusi desa
menyetorkan penerimaan desa ke rekening kas desa
melakukan penatausahaan keuangan desa',
                'rights' => 'mendapat penghasilan tetap dan tunjangan
mendapat jaminan kesehatan
mendapat cuti
mendapat perlindungan hukum',
                'obligations' => 'melaksanakan pengelolaan keuangan desa dengan baik
membuat laporan keuangan secara berkala
menjaga transparansi keuangan desa
melakukan koordinasi dengan sekretaris desa
mematuhi peraturan pengelolaan keuangan desa',
                'sort_order' => 3,
            ],
            [
                'position_name' => 'Kepala Urusan Pemerintahan',
                'person_name' => 'Nama Kepala Urusan Pemerintahan',
                'duties' => 'Kepala Urusan Pemerintahan bertugas membantu Kepala Desa dalam melaksanakan urusan pemerintahan umum.

Kepala Urusan Pemerintahan mengoordinasikan kegiatan di bidang pemerintahan umum termasuk administrasi kependudukan dan pelayanan umum.',
                'authorities' => 'melaksanakan manajemen tata praja pemerintahan
melaksanakan administrasi kependudukan
melaksanakan pencatatan sipil
melaksanakan pengelolaan informasi
melaksanakan administrasi umum',
                'rights' => 'mendapat penghasilan tetap dan tunjangan
mendapat jaminan kesehatan
mendapat cuti
mendapat perlindungan hukum',
                'obligations' => 'melayani masyarakat dengan baik
melaksanakan tugas administrasi pemerintahan
menjaga ketertiban administrasi
melakukan koordinasi dengan perangkat desa lain
membuat laporan berkala',
                'sort_order' => 4,
            ],
            [
                'position_name' => 'Kepala Urusan Kesejahteraan',
                'person_name' => 'Nama Kepala Urusan Kesejahteraan',
                'duties' => 'Kepala Urusan Kesejahteraan bertugas membantu Kepala Desa dalam melaksanakan urusan kesejahteraan masyarakat.

Kepala Urusan Kesejahteraan mengoordinasikan program-program pemberdayaan masyarakat dan kesejahteraan sosial.',
                'authorities' => 'melaksanakan pemberdayaan masyarakat
melaksanakan pembinaan kesejahteraan keluarga
melaksanakan pembinaan kepemudaan dan olahraga
melaksanakan pembinaan ketenagakerjaan
melaksanakan pembinaan sosial',
                'rights' => 'mendapat penghasilan tetap dan tunjangan
mendapat jaminan kesehatan
mendapat cuti
mendapat perlindungan hukum',
                'obligations' => 'memberdayakan masyarakat desa
mengembangkan potensi sosial ekonomi masyarakat
melakukan pembinaan kepada lembaga kemasyarakatan
membuat program kesejahteraan masyarakat
melakukan koordinasi dengan stakeholder terkait',
                'sort_order' => 5,
            ],
            [
                'position_name' => 'Kepala Dusun I',
                'person_name' => 'Nama Kepala Dusun I',
                'duties' => 'Kepala Dusun bertugas membantu Kepala Desa dalam pelaksanaan tugasnya di wilayah dusun.

Kepala Dusun bertanggung jawab atas penyelenggaraan pemerintahan, pelaksanaan pembangunan, pembinaan kemasyarakatan, dan pemberdayaan masyarakat di wilayah dusun.',
                'authorities' => 'mengkoordinasikan kegiatan pemberdayaan masyarakat
mengkoordinasikan upaya penyelenggaraan ketentraman dan ketertiban
mengkoordinasikan penerapan dan penegakan peraturan desa
mengkoordinasikan penyelenggaraan gotong royong',
                'rights' => 'mendapat penghasilan tetap dan tunjangan
mendapat jaminan kesehatan
mendapat cuti
mendapat perlindungan hukum',
                'obligations' => 'membantu kepala desa dalam pelaksanaan tugasnya
mengkoordinasikan kegiatan di tingkat dusun
membina dan memberdayakan masyarakat
menjaga keamanan dan ketertiban di wilayah dusun
melaporkan pelaksanaan tugas kepada kepala desa',
                'sort_order' => 6,
            ],
        ];

        foreach ($positions as $position) {
            OrganizationPosition::create($position);
        }
    }
}