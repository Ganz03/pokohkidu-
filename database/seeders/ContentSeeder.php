<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Announcement;
use App\Models\Event;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Sample News
        News::create([
            'title' => 'Musrenbangdes Pokoh Kidul Fokus pada Penyusunan RKPD 2026',
            'slug' => 'musrenbangdes-pokoh-kidul-fokus-rkpd-2026',
            'excerpt' => 'Pemerintah Desa Pokoh Kidul sukses menyelenggarakan Musyawarah Perencanaan Pembangunan Desa.',
            'content' => '<p>Pokohkidul.desa.id, Wonogiri - Pemerintah Desa Pokoh Kidul sukses menyelenggarakan Musyawarah Perencanaan Pembangunan Desa pada Rabu, 22 Januari 2025, bertempat di Balai Desa Pokoh Kidul...</p>',
            'category' => 'berita',
            'status' => 'published',
            'is_featured' => true,
            'published_at' => now(),
        ]);

        // Sample Announcement
        Announcement::create([
            'title' => 'Pengumuman Pelayanan Administrasi Desa',
            'slug' => 'pengumuman-pelayanan-administrasi-desa',
            'content' => '<p>Diberitahukan kepada seluruh warga Desa Pokoh Kidul bahwa pelayanan administrasi desa akan dibuka setiap hari...</p>',
            'type' => 'info',
            'status' => 'published',
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ]);

        // Sample Event
        Event::create([
            'title' => 'MUSRENBANG RKPD 2026',
            'slug' => 'musrenbang-rkpd-2026',
            'description' => 'Musyawarah Perencanaan Pembangunan Desa untuk penyusunan RKPD 2026.',
            'content' => '<p>Agenda penting untuk menyusun rencana pembangunan desa tahun 2026...</p>',
            'location' => 'Balai Desa Pokoh Kidul',
            'event_date' => now()->addDays(30),
            'status' => 'scheduled',
            'organizer' => 'Pemerintah Desa Pokoh Kidul',
        ]);
    }
}
