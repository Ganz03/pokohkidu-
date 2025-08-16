<?php

namespace Database\Seeders;

use App\Models\HeroContent;
use App\Models\Monument;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        // Hero Content
        HeroContent::create([
            'title' => 'Selamat Datang di Desa Pokohkidul',
            'subtitle' => 'Portal Resmi Pemerintah Desa',
            'description' => 'Temukan informasi terkini tentang pelayanan publik, potensi desa, dan perkembangan pembangunan di Desa Pokohkidul. Kami berkomitmen memberikan pelayanan terbaik untuk masyarakat.',
            'is_active' => true,
        ]);

        // Monument
        Monument::create([
            'name' => 'Monumen Patung Bedol Desa',
            'description' => 'Patung Bedol Desa sebagai simbol pengorbanan puluhan ribu warga Wonogiri untuk pembangunan waduk yang memberikan manfaat bagi masyarakat luas.',
            'history' => 'Monumen ini dibangun untuk mengenang sejarah perpindahan warga desa (bedol desa) yang terdampak pembangunan Waduk Gajah Mungkur pada tahun 1970-an.',
            'is_featured' => true,
            'is_active' => true,
        ]);
    }
}