<?php

namespace App\Http\Controllers;

use App\Models\VillageHistory;
use Illuminate\Http\Request;

class VillageHistoryController extends Controller
{
    /**
     * Display the village history page
     */
    public function index()
    {
        $villageHistory = VillageHistory::getActive();
        
        // If no data exists, create default data
        if (!$villageHistory) {
            $villageHistory = $this->createDefaultData();
        }
        
        return view('village-history.index', compact('villageHistory'));
    }

    /**
     * Create default village history data
     */
    private function createDefaultData()
    {
        return VillageHistory::create([
            'title' => 'Sejarah Desa Pokoh Kidul',
            'introduction' => 'Pokoh kidul merupakan salah satu desa yang terletak di wilayah kecamatan Wonogiri, Kabupaten Wonogiri, Jawa Tengah.',
            'origin_story' => 'Menurut keterangan dari Kepala Desa Pokoh Kidul, Bapak Wuryatno (72), asal usul penamaan Desa Pokoh Kidul sendiri bermula dengan adanya seseorang yang mencari rumah salah satu darah biru di Wonogiri. Pencarian tersebut terus berlanjut hingga orang tersebut sampai di daerah Pokoh. Pada saat di daerah Pokoh orang tersebut bertanya kepada warga setempat di mana tokoh darah biru ini bertempat tinggal. Warga setempat menjelaskan mengenai keberadaan dari tokoh tersebut dengan berkata <strong>Pokoh mengidul</strong>. Mengidul sendiri dapat diartikan sebagai arah ke Selatan bagi orang Jawa. Daerah yang ditunjukan oleh warga setempat tersebut kemudian dikenal dengan nama Pokoh Kidul.',
            'pki_rebellion' => 'Desa Pokoh Kidul pernah terkena dampak dari kejadian Pemberontakan PKI tahun 1965. Menurut Bapak Parlan (75), kejadian pemberantasan PKI di Pokoh Kidul dilaksanakan pada tanggal <strong>22 Oktober 1965</strong>. Pasukan yang akan datang ke Wonogiri untuk pemberantasan PKI sendiri adalah RPKAD atau Resimen Pasukan Komando Angkatan Darat yang memang pada saat itu ditugaskan untuk menumpas PKI. Desa Pokoh Kidul sendiri terdapat 3 orang PKI yang kemudian ditangkap. Dua orang tersebut berasal dari dusun Jurug dan Petir, sedangkan satu orang dari Gudang di bunuh karena dianggap pimpinan ranting dari PKI.',
            'reservoir_impact' => 'Desa Pokoh Kidul pernah mengalami pengurangan wilayah. Hal tersebut disebabkan pada tahun <strong>1974</strong> terdapat proyek Waduk Gajah Mungkur yang terdapat di Kabupaten Wonogiri mulai dibangun. Pembangunan Waduk ini memakan luas wilayah yang cukup besar karena harus menenggelamkan 51 desa pada saat itu. Pembangunan waduk ini berimbas pada wilayah Desa Pokoh Kidul yang mulai menyempit karena harus digusur untuk pembangunan.<br><br>Sebanyak <strong>tiga dusun</strong> di Desa Pokoh kidul terimbas pembangunan waduk sehingga terendam air secara total. Tiga dusun yang harus digusur pada saat itu adalah dusun <em>Ndungsengon</em>, <em>Ndungrejo</em>, serta <em>Karanglo</em>. Beberapa dusun seperti Gayam, Petir, Karang Talun, dan Gudang hanya sebagian wilayahnya yang tergenang air.<br><br>Pembangunan Waduk ini selesai pada tahun <strong>1981</strong> dan diresmikan oleh Presiden Soeharto pada <strong>17 November 1981</strong>. Peresmian waduk ini ditandai dengan pembuatan patung bedol desa yang diibaratkan sebagai ikon pengorbanan warga yang rela mengikuti transmigrasi untuk kelancaran dari proyek Waduk Gajah Mungkur.',
            'government_history' => 'Menurut sejarahnya, wilayah di Wonogiri dahulu merupakan bagian dari wilayah perjuangan Raden Mas Said. Hal tersebut membuat daerah Pokoh Kidul telah ada bahkan sebelum kemerdekaan Indonesia. Dengan sejarah yang panjang tersebut, pemerintahan di Pokoh Kidul telah mengalami pergantian beberapa kali.<br><br><strong>Berikut ada 5 nama kepala desa yang pernah memimpin di desa Pokoh Kidul:</strong><br><ol><li><strong>Raden Ngabehi Ponco Sucitro</strong> (sekitar tahun 1930an - 1965)</li><li><strong>Hatmo Sukarto</strong> (1966-1990)</li><li><strong>Sugiyono</strong> (1991-1999)</li><li><strong>Parlan</strong> (1999-2007)</li><li><strong>Wuryatno</strong> (2007-sekarang)</li></ol>',
            'cultural_heritage' => 'Kesenian yang masih berusaha dipertahankan di desa Pokoh Kidul sendiri adalah <strong>gejog lesung</strong>. Kesenian ini berasal dari daerah Yogyakarta, Klaten dan Surakarta. Gejog lesung sendiri berasal dari 2 kata yakni <em>gejog</em> yang berarti menumbuk serta <em>lesung</em> yang merupakan alat penumbuk padi. Seperti pada arti namanya, gejog lesung dimainkan seperti alat musik dengan cara memukulnya sesuai dengan irama. Biasanya gejog lesung ini akan disertakan nyanyian serta tarian. Gejog lesung sendiri dapat diartikan sebagai ekspresi kebahagian petani yang telah melalui masa panen.<br><br>Menurut Bapak Kardi (79), Kesenian gejog lesung di desa Pokoh Kidul sebenarnya sudah mulai sejak lama. Dahulu gejog lesung ini diadakan sewaktu ada acara hajatan warga. Kesenian ini semakin meredup seiring perkembangan zaman. Melihat fakta tersebut, kesenian ini kemudian mulai dilestarikan kembali pada sekitar tahun <strong>2015</strong>.<br><br>Pengadaan kesenian gejog lesung di desa Pokoh Kidul ini pertama kali dilaksanakan oleh <strong>ibu Sutarmi</strong>. Tujuan dari ibu Sutarmi mengadakan kesenian gejog lesung ini adalah untuk merangkul ibu-ibu kembali untuk dapat bersosialisasi serta memberikan panggung bagi mereka untuk kembali berkarya. Meski kesenian ini hanya diadakan menjelang hari kemerdekaan Indonesia saja, namun diharapkan kesenian ini bisa tetap lestari dan dijaga keberadaannya oleh masyarakat Pokoh Kidul.',
            'author' => 'Risma Maharani',
            'is_active' => true
        ]);
    }
}