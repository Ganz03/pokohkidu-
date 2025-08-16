<?php

namespace App\Http\Controllers;

use App\Models\VillageDemographic;
use Illuminate\Http\Request;

class VillageDemographicController extends Controller
{
    /**
     * Display the village demographic page
     */
    public function index()
    {
        $villageDemographic = VillageDemographic::getActive();
        
        // If no data exists, create default data
        if (!$villageDemographic) {
            $villageDemographic = $this->createDefaultData();
        }
        
        return view('village-demographics.index', compact('villageDemographic'));
    }

    /**
     * Create default village demographic data
     */
    private function createDefaultData()
    {
        $content = '<h3>Data Kependudukan</h3>
<p>Secara demografis jumlah Penduduk Desa Pokoh Kidul berdasarkan data profil desa pada tahun 2019 berjumlah <strong>5.585 jiwa</strong>, adapun jumlah pertumbuhan penduduk periode 2017-2019.</p>

<h3>Tabel Data Pertumbuhan Jumlah Penduduk Desa Pokoh Kidul</h3>
<table border="1" style="width: 100%; border-collapse: collapse;">
<thead>
<tr>
<th>NO</th>
<th>DESA</th>
<th>TAHUN 2017 (Jiwa)</th>
<th>TAHUN 2018 (Jiwa)</th>
<th>TAHUN 2019 (Jiwa)</th>
</tr>
</thead>
<tbody>
<tr>
<td>1.</td>
<td>Laki-laki</td>
<td>2.711</td>
<td>2.858</td>
<td>2.856</td>
</tr>
<tr>
<td>2.</td>
<td>Perempuan</td>
<td>2.615</td>
<td>2.731</td>
<td>2.729</td>
</tr>
<tr style="font-weight: bold; background-color: #f0f9ff;">
<td></td>
<td>Jumlah</td>
<td>5.326</td>
<td>5.589</td>
<td>5.585</td>
</tr>
</tbody>
</table>
<p><em>Sumber data profil desa tahun 2017 - 2019</em></p>

<h3>Analisis Data Kependudukan</h3>
<p>Data jumlah penduduk berdasarkan jumlah dari hasil pendataan yang dilaporkan di masing-masing RT dan Dusun jumlah penduduk meningkat dari <strong>5.326 jiwa tahun 2017</strong>, menjadi <strong>5.589 tahun 2018</strong>, dan kemudian menurun menjadi <strong>5.585 di tahun 2019</strong>.</p>

<h3>Struktur Pemerintahan Desa</h3>
<p>Desa Pokoh Kidul terdiri dari <strong>11 dusun</strong>, <strong>13 RW</strong> dan <strong>31 RT</strong>, dengan potensi perangkatnya terdiri dari seorang Kepala Desa (Kades), satu orang Sekretaris Desa (Sekdes), dua orang Kaur, satu orang Kasi dan empat orang Kepala Dusun (Kadus). Dengan rincian sebagai berikut:</p>

<h3>Tabel Jumlah Dusun dan RT</h3>
<table border="1" style="width: 100%; border-collapse: collapse;">
<thead>
<tr>
<th>NO</th>
<th>DUSUN</th>
<th>RW</th>
<th>RT</th>
</tr>
</thead>
<tbody>
<tr>
<td rowspan="5">1</td>
<td rowspan="5">Dusun Pengkol</td>
<td rowspan="3">RW I</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td>RT 03</td>
</tr>
<tr>
<td rowspan="2">RW II</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td rowspan="4">2</td>
<td rowspan="4">Dusun Karangtalun</td>
<td rowspan="2">RW III</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td rowspan="2">RW IV</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td rowspan="2">3</td>
<td rowspan="2">Dusun Gudang</td>
<td rowspan="2">RW V</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td rowspan="3">4</td>
<td rowspan="3">Dusun Kajar</td>
<td rowspan="3">RW VI</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td>RT 03</td>
</tr>
<tr>
<td rowspan="5">5</td>
<td rowspan="5">Dusun Norogo</td>
<td rowspan="3">RW VII</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td>RT 03</td>
</tr>
<tr>
<td rowspan="2">RW VIII</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td rowspan="4">6</td>
<td rowspan="4">Dusun Jurug</td>
<td rowspan="2">RW IX</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td rowspan="2">RW X</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td rowspan="2">7</td>
<td rowspan="2">Dusun Sidarjo</td>
<td rowspan="2">RW XI</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td>8</td>
<td>Dusun Pule</td>
<td>RW XII</td>
<td>RT 01</td>
</tr>
<tr>
<td>9</td>
<td>Dusun Kebyuk</td>
<td>-</td>
<td>RT 02</td>
</tr>
<tr>
<td>10</td>
<td>Dusun Gayam</td>
<td>-</td>
<td>RT 03</td>
</tr>
<tr>
<td rowspan="3">11</td>
<td rowspan="3">Dusun Perumahan</td>
<td rowspan="3">RW XIII</td>
<td>RT 01</td>
</tr>
<tr>
<td>RT 02</td>
</tr>
<tr>
<td>RT 03</td>
</tr>
<tr style="font-weight: bold; background-color: #f0f9ff;">
<td colspan="2">JUMLAH</td>
<td>13</td>
<td>31</td>
</tr>
</tbody>
</table>

<h3>Badan Permusyawaratan Desa (BPD)</h3>
<p>Kelembagaan dan Keanggotaan Badan Permusyawaratan Desa (BPD) berjumlah <strong>9 orang</strong> yang terdiri dari <strong>7 orang laki-laki</strong> dan <strong>2 orang perempuan</strong>. Dengan komposisi satu orang ketua, satu orang wakil ketua, satu orang sekretaris dan 6 anggota.</p>';

        return VillageDemographic::create([
            'title' => 'Demografi Desa Pokoh Kidul',
            'content' => $content,
            'is_active' => true
        ]);
    }
}