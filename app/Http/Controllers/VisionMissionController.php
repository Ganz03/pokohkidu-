<?php
// File: app/Http/Controllers/VisionMissionController.php

namespace App\Http\Controllers;

use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    /**
     * Display the vision mission page
     */
    public function index()
    {
        $visionMission = VisionMission::getActive();
        
        // If no data exists, create default data
        if (!$visionMission) {
            $visionMission = $this->createDefaultData();
        }
        
        return view('vision-mission.index', compact('visionMission'));
    }

    /**
     * Create default vision mission data
     */
    private function createDefaultData()
    {
        return VisionMission::create([
            'title' => 'Visi Misi Desa',
            'description' => 'Visi merupakan arah pembangunan atau kondisi masa depan desa yang ingin dicapai dalam 6 (enam) tahun mendatang. Visi juga harus menjawab permasalahan pembangunan desa dan/atau isu strategis yang harus diselesaikan dalam jangka menengah serta sejalan dengan visi dan arah Pembangunan Jangka Menengah Daerah tahun 2016 - 2021 yaitu <em>MEMBANGUN WONOGIRI SUKSES, BERIMAN, BERBUDAYA, BERKEADILAN, BERDAYA SAING, DAN DEMOKRATIS.</em><br><br>Dengan mempertimbangkan potensi desa, kondisi desa, permasalahan pembangunan, tantangan yang dihadapi serta isu-isu strategis, maka dirumuskan visi, misi, tujuan dan sasaran pembangunan jangka menengah desa. Visi dan Misi Pembangunaan Desa Pokoh Kidul Tahun 2020-2025 adalah:',
            'vision_title' => 'Visi',
            'vision_content' => '"Mewujudkan Masyarakat Desa Pokoh Kidul yang Sukses, Dinamis, Agamis, Berdaya Saing dan Berbudaya."',
            'mission_title' => 'Misi',
            'mission_content' => 'Untuk mewujudkan visi Desa Pokoh Kidul Kecamatan Wonogiri Kabupaten Wonogiri Tahun 2020 – 2025 tersebut, maka dijabarkan dalam misi yang menjadi pedoman bagi pembangunan Desa Pokoh Kidul, yaitu :<br><br><ol><li>Meningkatkan sistem manajemen pemerintahan desa yang profesional dan berkualitas dalam rangka memberikan pelayanan kepada masyarakat serta harmonisasi hubungan antar perangkat desa dan lembaga-lembaga desa.</li><li>Mendorong terwujudnya peran serta masyarakat untuk ikut aktif dalam pembangunan Desa Pokoh Kidul di segala bidang sesuai tugas pokok dan fungsi masing-masing.</li><li>Mengupayakan kehidupan yang layak berdasarkan atas kemanusiaan yang adil dan beradab bagi masyarakat, utamanya masyarakat miskin/lemah dengan berbasis pada ekonomi kerakyatan.</li><li>Bersinergi dengan pemerintah yang lebih tinggi khususnya pemerintah daerah Kabupaten Wonogiri dalam rangka sesarengan mbangun Wonogiri.</li><li>Menciptakan pemerintahan yang bersih dan berwibawa dan menjadikan Desa Pokoh Kidul sebagai desa yang melayani masyarakatnya dengan sebaik-baiknya.</li></ol>',
            'is_active' => true
        ]);
    }
}