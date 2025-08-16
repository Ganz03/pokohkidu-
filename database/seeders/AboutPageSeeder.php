<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        AboutPage::create([
            'title' => 'Tentang Kami',
            'content' => '
                <h2>Tentang Kami</h2>
                <p>Secara administratif Desa Pokoh Kidul Kecamatan Wonogiri merupakan salah satu Desa dari 251 Desa di Kabupaten Wonogiri, yang mempunyai jarak 4 km dari kota kabupaten, memiliki luas 1.346,1850 ha. Secara geografis Desa Pokoh Kidul sendiri terletak di perbatasan dengan:</p>
                
                <ul>
                    <li><strong>Sebelah Utara</strong>: Desa Purworejo, Wonogiri</li>
                    <li><strong>Sebelah Timur</strong>: Desa Pondok, Ngadirojo</li>
                    <li><strong>Sebelah Selatan</strong>: Desa Pondok Sari, Nguntoronadi</li>
                    <li><strong>Sebelah Barat</strong>: Kelurahan Giritirto, Wonogiri</li>
                </ul>
                
                <p>Secara astronomis Desa Pokoh Kidul terletak antara -7.831476 Lintang Selatan (LS) dan antara 110.9399 Bujur Timur (BT) dan secara Topografis Desa Pokoh Kidul mempunyai ketinggian 158 m dari permukaan laut. Sebagian besar topografi tidak rata dengan kemiringan rata-rata 30°, sehingga terdapat perbedaan antara kawasan yang satu dengan kawasan lainnya yang membuat kondisi sumber daya alam saling berbeda.</p>
                
                <p>Sesuai dengan letak geografis, dipengaruhi iklim daerah tropis yang dipengaruhi oleh angin muson dengan 2 musim, yaitu musim kemarau pada bulan April – September dan musim penghujan antara bulan Oktober – Maret.</p>
                
                <p>Pengolahan lahan untuk persawahan kebanyakan di daerah dataran yang sering terkena banjir dan daerah dataran kaki perbukitan. Sedangkan penggunaan lahan untuk permukiman perumahan penduduk sebagian besar di daerah tegalan. Selain untuk perumahan warga penggunaan lahan tegalan ditanami dengan jenis tanaman ketela pohon, jagung, kacang tanah, dan kedelai.</p>
            ',
            'office_info' => '
                <h3>Kantor</h3>
                <div>
                    <strong>POKOHKIDUL - WONOGIRI - WONOGIRI</strong>
                </div>
                <table style="margin-top: 1rem;">
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td>:</td>
                        <td>Karangtalun RT.001/003, Pokoh Kidul, Kec. Wonogiri, Kab. Wonogiri, Jawa Tengah</td>
                    </tr>
                    <tr>
                        <td><strong>Kode Pos</strong></td>
                        <td>:</td>
                        <td>57615</td>
                    </tr>
                    <tr>
                        <td><strong>No.Telp</strong></td>
                        <td>:</td>
                        <td>082324257542</td>
                    </tr>
                    <tr>
                        <td><strong>Fax</strong></td>
                        <td>:</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>:</td>
                        <td>pokohkidulwonogiri@gmail.com</td>
                    </tr>
                    <tr>
                        <td><strong>Website</strong></td>
                        <td>:</td>
                        <td>pokohkidul.desa.id</td>
                    </tr>
                </table>
            ',
            'is_active' => true,
        ]);
    }
}
