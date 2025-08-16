<?php
// database/seeders/LembagaDesaSeeder.php

namespace Database\Seeders;

use App\Models\LembagaDesa;
use App\Models\PengurusLembaga;
use Illuminate\Database\Seeder;

class LembagaDesaSeeder extends Seeder
{
    public function run()
    {
        // Data BPD berdasarkan dokumen yang diberikan
        $bpd = LembagaDesa::create([
            'nama_lembaga' => 'Badan Permusyawaratan Desa',
            'slug' => 'badan-permusyawaratan-desa',
            'singkatan' => 'BPD',
            'dasar_hukum' => 'UU No. 6/2014 Tentang Desa',
            'alamat_kantor' => 'Kantor Desa Pokoh Kidul, Karangtalun Rt. 01 Rw. 03 Pokoh Kidul, Wonogiri',
            'profil' => '<p>Badan Permusyawaratan Desa (BPD) Adalah lembaga perwujudan demokrasi dalam penyelenggaraan pemerintahan desa. BPD bisa disebut sebagai parlemen di desa. BPD adalah lembaga baru di desa pada masa otonomi daerah di Indonesia. Berdasarkan fungsinya, BPD bisa disebut sebagai lembaga kemasyarakatan. Dikarenakan bersesuaian dengan pada pemikiran pokok yang dalam kesadaran masyarakat.</p>

<p>Anggota BPD adalah para wakil dari penduduk desa yang berhubungan berdasarkan keterwakilan wilayah yang ditetapkan dengan cara musyawarah dan mufakat. Anggota BPD tersusun dari ketua Rukun Warga (RW), pemangku adat, golongan profesi, pemuka agama dan tokoh atau pemuka masyarakat lain.</p>

<p>Masa jabatan anggota dari BPD adalah 6 tahun dan bisa diangkat atau diusulkan kembali untuk masa jabatan satu kali pada berikutnya. Pimpinan dan Anggota BPD tidak diperkenankan merangkap jabatan sebagai Kepala Desa dan Perangkat Desa.</p>

<p>Peresmian anggota BPD dikukuhkan dengan Keputusan Bupati/Walikota yang mana sebelum menjabat mengucapkan sumpah/janji secara bersama-sama dihadapan masyarakat dan dipandu oleh Bupati/Walikota.</p>',
            'visi' => 'Mewujudkan pelayanan yang baik sebagai penyalur aspirasi masyarakat dan sebagai mitra kerja Pemerintah Desa dalam merancang, mengawasi pelaksanaan peraturan desa dan peraturan kepala desa menuju pemerintah yang transparan, mandiri, adil, makmur dan sejahtera tanpa diskriminasi gender.',
            'misi' => '<ul>
<li>Berusaha memperjuangkan peningkatan anggaran untuk organisasi wanita di Desa Pokoh Kidul.</li>
<li>Menampung aspirasi dari semua organisasi wanita baik secara langsung ataupun melalui media sosial.</li>
<li>Berusaha sebaik mungkin mengemban amanah yang telah dipercaya.</li>
<li>Meningkatkan peran BPD dalam menggali, menampung, menghimpun dan menyalurkan aspirasi masyarakat dalam musyawarah pedukuhan dan musyawarah desa.</li>
<li>Meningkatkan kerjasama yang baik dalam penyelenggaraan Pemerintah Desa.</li>
<li>Meningkatkan kearifan dan potensi lokal untuk mewujudkan masyarakat yang adil dan makmur.</li>
</ul>',
            'tugas_pokok_fungsi' => '<h3>Fungsi BPD:</h3>
<ul>
<li>Membahas dan menyepakati Rancangan Peraturan Desa bersama Kepala Desa;</li>
<li>Menampung dan menyalurkan aspirasi masyarakat Desa; dan</li>
<li>Melakukan pengawasan kinerja Kepala Desa.</li>
</ul>
<p><em>sumber: UU No. 6/2014 Tentang Desa, Pasal 55</em></p>',
            'hak' => '<ul>
<li>mengawasi dan meminta keterangan tentang penyelenggaraan Pemerintahan Desa kepada Pemerintah Desa;</li>
<li>menyatakan pendapat atas penyelenggaraan Pemerintahan Desa, pelaksanaan Pembangunan Desa, pembinaan kemasyarakatan Desa, dan pemberdayaan masyarakat Desa; dan</li>
<li>mendapatkan biaya operasional pelaksanaan tugas dan fungsinya dari Anggaran Pendapatan dan Belanja Desa</li>
</ul>
<p><em>sumber: UU No. 6/2014 Tentang Desa, Pasal 61</em></p>

<h3>Hak Anggota BPD:</h3>
<ul>
<li>mengajukan usul rancangan Peraturan Desa;</li>
<li>mengajukan pertanyaan;</li>
<li>menyampaikan usul dan/atau pendapat;</li>
<li>memilih dan dipilih; dan</li>
<li>mendapat tunjangan dari Anggaran Pendapatan dan Belanja Desa.</li>
</ul>
<p><em>sumber: UU No. 6/2014 Tentang Desa, Pasal 62</em></p>',
            'kewajiban' => '<ul>
<li>memegang teguh dan mengamalkan Pancasila, melaksanakan Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, serta mempertahankan dan memelihara keutuhan Negara Kesatuan Republik Indonesia dan Bhinneka Tunggal Ika;</li>
<li>melaksanakan kehidupan demokrasi yang berkeadilan gender dalam penyelenggaraan Pemerintahan Desa;</li>
<li>menyerap, menampung, menghimpun, dan menindaklanjuti aspirasi masyarakat Desa;</li>
<li>mendahulukan kepentingan umum di atas kepentingan pribadi, kelompok, dan/atau golongan;</li>
<li>menghormati nilai sosial budaya dan adat istiadat masyarakat Desa; dan</li>
<li>menjaga norma dan etika dalam hubungan kerja dengan lembaga kemasyarakatan Desa.</li>
</ul>
<p><em>sumber: UU No. 6/2014 Tentang Desa, Pasal 63</em></p>',
            'tugas_wewenang' => '<ul>
<li>Membahas dan membuat rancangan peraturan di desa dengan kepala desa.</li>
<li>Melakukan pengawasan kepada pelaksanaan peraturan desa dan peraturan kepala desa.</li>
<li>Mengajukan usulan pengangkatan dan pemberhentian kepala desa.</li>
<li>Membentuk panitia pemilihan kepala desa, didalam melakukan pemilihan kepada desa, BPD berhak membentuk panitia pemilihan kepala desa yang sesuai dengan Peraturan Daerah Kabupaten.</li>
<li>Menggali, menampung, menghimpun, merumuskan dan menyalurkan aspirasi dari masyarakat di desa.</li>
<li>Memberi persetujuan pemberhentian atau pemberhentian sementara perangkat desa.</li>
<li>Membuat susunan tata tertib BPD.</li>
<li>Semua aspirasi dari penduduk desa khususnya pada bidang pembangunan, BPD diharapkan dengan rasa loyalitas mengakui, menampung dan mengayomi masyarakat dengan rasa penuh tanggung jawab dan kerjasama yang baik.</li>
<li>Pertimbangan dan saran-saran dari BPD kepada pemerintahan desa dan masyarakat, harus dijaga supaya kepercayaan dan dukungan tetap ada, sehingga kepala desa selalu dan bersungguh-sungguh untuk melakukan tugas dengan penuh tanggung jawab.</li>
</ul>',
            'is_active' => true,
            'urutan_tampil' => 1
        ]);

        // Data pengurus BPD
        $pengurusBpd = [
            ['nama' => 'JOKO TRIYONO', 'jabatan' => 'KETUA', 'pendidikan' => 'S1', 'urutan_tampil' => 1],
            ['nama' => 'TRIYONO', 'jabatan' => 'WAKIL KETUA', 'pendidikan' => 'SLTA', 'urutan_tampil' => 2],
            ['nama' => 'YULI PURWANINGSIH', 'jabatan' => 'SEKRETARIS', 'pendidikan' => 'D1', 'urutan_tampil' => 3],
            ['nama' => 'HENY MARIA KOROMPIS', 'jabatan' => 'ANGGOTA', 'pendidikan' => 'SLTA', 'urutan_tampil' => 4],
            ['nama' => 'SUYANTO', 'jabatan' => 'ANGGOTA', 'pendidikan' => 'SLTP', 'urutan_tampil' => 5],
            ['nama' => 'JOKO PINILIH', 'jabatan' => 'ANGGOTA', 'pendidikan' => 'S1', 'urutan_tampil' => 6],
            ['nama' => 'MARDIONO', 'jabatan' => 'ANGGOTA', 'pendidikan' => 'S1', 'urutan_tampil' => 7],
            ['nama' => 'WARSITO', 'jabatan' => 'ANGGOTA', 'pendidikan' => 'SLTA', 'urutan_tampil' => 8],
            ['nama' => 'WINOTO', 'jabatan' => 'ANGGOTA', 'pendidikan' => 'SLTA', 'urutan_tampil' => 9],
        ];

        foreach ($pengurusBpd as $pengurus) {
            PengurusLembaga::create([
                'lembaga_desa_id' => $bpd->id,
                'nama' => $pengurus['nama'],
                'jabatan' => $pengurus['jabatan'],
                'pendidikan' => $pengurus['pendidikan'],
                'tanggal_mulai_jabatan' => '2023-01-01',
                'is_active' => true,
                'urutan_tampil' => $pengurus['urutan_tampil']
            ]);
        }

        // Contoh lembaga lain
        $pkk = LembagaDesa::create([
            'nama_lembaga' => 'Pemberdayaan Kesejahteraan Keluarga',
            'slug' => 'pemberdayaan-kesejahteraan-keluarga',
            'singkatan' => 'PKK',
            'dasar_hukum' => 'Permendagri No. 1 Tahun 2013',
            'alamat_kantor' => 'Kantor Desa Pokoh Kidul, Karangtalun Rt. 01 Rw. 03 Pokoh Kidul, Wonogiri',
            'profil' => '<p>Pemberdayaan Kesejahteraan Keluarga (PKK) adalah organisasi kemasyarakatan yang memberdayakan wanita untuk turut berpartisipasi dalam pembangunan Indonesia. PKK merupakan mitra kerja pemerintah dan organisasi kemasyarakatan lainnya, yang berfungsi sebagai fasilitator, perencana, pelaksana, pengendali dan penggerak pada masing-masing jenjang untuk terwujudnya keluarga yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berakhlak mulia dan berbudi luhur, sehat sejahtera, maju dan mandiri, kesetaraan dan keadilan gender serta kesadaran hukum dan lingkungan.</p>',
            'visi' => 'Terwujudnya keluarga yang beriman dan bertaqwa, berakhlak mulia dan berbudi luhur, sehat, maju, mandiri, kesetaraan dan keadilan gender serta kesadaran hukum dan lingkungan.',
            'misi' => '<ul>
<li>Meningkatkan pembentukan karakter keluarga melalui penghayatan, pengamalan Pancasila</li>
<li>Meningkatkan ketahanan keluarga</li>
<li>Meningkatkan kesejahteraan keluarga dengan mendorong kemandirian keluarga dan pemberdayaan ekonomi keluarga</li>
<li>Meningkatkan kualitas hidup dan tumbuh kembang anak</li>
<li>Meningkatkan pemahaman dan kesadaran atas hak dan kewajiban dalam keluarga</li>
</ul>',
            'is_active' => true,
            'urutan_tampil' => 2
        ]);

        $karangTaruna = LembagaDesa::create([
            'nama_lembaga' => 'Karang Taruna',
            'slug' => 'karang-taruna',
            'singkatan' => 'KARTAR',
            'dasar_hukum' => 'Permensos No. 25 Tahun 2019',
            'alamat_kantor' => 'Kantor Desa Pokoh Kidul, Karangtalun Rt. 01 Rw. 03 Pokoh Kidul, Wonogiri',
            'profil' => '<p>Karang Taruna adalah organisasi sosial kemasyarakatan sebagai wadah dan sarana pengembangan setiap anggota masyarakat yang tumbuh dan berkembang atas dasar kesadaran dan tanggung jawab sosial dari, oleh dan untuk masyarakat terutama generasi muda di wilayah desa/kelurahan atau komunitas adat sederajat dan terutama bergerak di bidang usaha kesejahteraan sosial.</p>',
            'visi' => 'Terwujudnya kesejahteraan sosial yang semakin meningkat bagi generasi muda di desa sehingga dapat mengaktualisasikan dirinya sebagai insian pembangunan yang mampu mengatasi masalah kesejahteraan sosial di lingkungannya.',
            'misi' => '<ul>
<li>Penyelenggaraan usaha kesejahteraan sosial</li>
<li>Penyelenggaraan pendidikan dan pelatihan bagi masyarakat</li>
<li>Penyelenggaraan pemberdayaan masyarakat terutama generasi muda secara komprehensif, terpadu dan terarah</li>
<li>Penyelenggaraan kegiatan pengembangan jiwa kewirausahaan bagi generasi muda di lingkungannya</li>
</ul>',
            'is_active' => true,
            'urutan_tampil' => 3
        ]);

        $lpmDesa = LembagaDesa::create([
            'nama_lembaga' => 'Lembaga Pemberdayaan Masyarakat Desa',
            'slug' => 'lembaga-pemberdayaan-masyarakat-desa',
            'singkatan' => 'LPMD',
            'dasar_hukum' => 'UU No. 6 Tahun 2014 tentang Desa',
            'alamat_kantor' => 'Kantor Desa Pokoh Kidul, Karangtalun Rt. 01 Rw. 03 Pokoh Kidul, Wonogiri',
            'profil' => '<p>Lembaga Pemberdayaan Masyarakat Desa (LPMD) adalah lembaga atau wadah yang dibentuk atas prakarsa masyarakat sebagai mitra pemerintah desa dalam memberdayakan masyarakat desa. LPMD berfungsi sebagai penampung dan penyalur aspirasi masyarakat dalam pembangunan, menciptakan suasana yang dapat mendorong timbulnya swadaya gotong royong masyarakat.</p>',
            'is_active' => true,
            'urutan_tampil' => 4
        ]);
    }
}