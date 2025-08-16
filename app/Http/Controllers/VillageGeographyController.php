<?php

namespace App\Http\Controllers;

use App\Models\VillageGeography;
use Illuminate\Http\Request;

class VillageGeographyController extends Controller
{
    /**
     * Display the village geography page
     */
    public function index()
    {
        $villageGeography = VillageGeography::getActive();
        
        // If no data exists, create default data
        if (!$villageGeography) {
            $villageGeography = $this->createDefaultData();
        }
        
        return view('village-geography.index', compact('villageGeography'));
    }

    /**
     * Create default village geography data
     */
    private function createDefaultData()
    {
        $content = '<h3>Informasi Administratif</h3>
<p>Secara administratif Desa Pokoh Kidul Kecamatan Wonogiri merupakan salah satu Desa dari 251 Desa di Kabupaten Wonogiri, yang mempunyai jarak 4 km dari kota kabupaten, memiliki luas 1.346,1850 ha.</p>

<h3>Batas Wilayah</h3>
<p>Secara geografis Desa Pokoh Kidul sendiri terletak di perbatasan dengan:</p>
<ul>
<li><strong>Sebelah Utara:</strong> Desa Purworejo, Kecamatan Wonogiri</li>
<li><strong>Sebelah Timur:</strong> Desa Pondok, Kecamatan Ngadirojo</li>
<li><strong>Sebelah Selatan:</strong> Desa Pondok Sari, Kecamatan Nguntoronadi</li>
<li><strong>Sebelah Barat:</strong> Kelurahan Giritirto, Kecamatan Wonogiri</li>
</ul>

<h3>Koordinat dan Topografi</h3>
<p>Secara astronomis Desa Pokoh Kidul terletak antara <strong>-7.831476 Lintang Selatan (LS)</strong> dan antara <strong>110.9399 Bujur Timur (BT)</strong> dan secara Topografis Desa Pokoh Kidul mempunyai ketinggian <strong>158 m dari permukaan laut</strong>. Sebagian besar topografi tidak rata dengan kemiringan rata-rata <strong>30°</strong>, sehingga terdapat perbedaan antara kawasan yang satu dengan kawasan lainnya yang membuat kondisi sumber daya alam saling berbeda.</p>

<h3>Iklim</h3>
<p>Sesuai dengan letak geografis, dipengaruhi iklim daerah tropis yang dipengaruhi oleh angin muson dengan 2 musim, yaitu:</p>
<ul>
<li><strong>Musim Kemarau:</strong> April – September</li>
<li><strong>Musim Penghujan:</strong> Oktober – Maret</li>
</ul>

<h3>Penggunaan Lahan</h3>
<p>Pengolahan lahan untuk persawahan kebanyakan di daerah dataran yang sering terkena banjir dan daerah dataran kaki perbukitan. Sedangkan penggunaan lahan untuk permukiman perumahan penduduk sebagian besar di daerah tegalan. Selain untuk perumahan warga penggunaan lahan tegalan ditanami dengan jenis tanaman <strong>ketela pohon, jagung, kacang tanah, dan kedelai</strong>.</p>

<h3>Tabel Peruntukan Lahan</h3>
<table border="1" style="width: 100%; border-collapse: collapse;">
<thead>
<tr>
<th rowspan="2">NO</th>
<th colspan="2">TANAH SAWAH</th>
<th colspan="2">TANAH KERING</th>
</tr>
<tr>
<th>JENIS</th>
<th>LUAS (Ha)</th>
<th>JENIS</th>
<th>LUAS (Ha)</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Irigasi teknis</td>
<td>0,00</td>
<td>Bangunan/pekarangan</td>
<td>100,00</td>
</tr>
<tr>
<td>2</td>
<td>Irigasi setengah teknis</td>
<td>9,00</td>
<td>Tegalan/kebon</td>
<td>200,00</td>
</tr>
<tr>
<td>3</td>
<td>Irigasi sederhana</td>
<td>0,00</td>
<td>Perkantoran</td>
<td>-</td>
</tr>
<tr>
<td>4</td>
<td>Tadah hujan</td>
<td>1,27</td>
<td>Lain-lain</td>
<td>-</td>
</tr>
</tbody>
</table>

<p><em>*Sumber data profil desa tahun 2019</em></p>';

        return VillageGeography::create([
            'title' => 'Geografis Desa Pokoh Kidul',
            'content' => $content,
            'is_active' => true
        ]);
    }
}