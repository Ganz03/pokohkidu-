<?php
// app/Http/Controllers/HomeController.php (yang sudah diupdate sebelumnya)
namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\HeroContent;
use App\Models\Monument;
use App\Models\GalleryItem;
use App\Models\OrganizationPosition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Hero Content
        $heroContent = HeroContent::getActive();
        $featuredMonument = Monument::getFeatured();
        
        // News untuk homepage
        $featuredNews = News::published()->featured()->latest()->limit(3)->get();
        $latestNews = News::published()->latest()->limit(5)->get();
        
        // Announcements untuk homepage
        $activeAnnouncements = Announcement::published()->active()->latest()->limit(5)->get();
        
        // Events untuk homepage
        $upcomingEvents = Event::upcoming()->limit(3)->get();
        
        // Gallery Items untuk homepage (featured items) - DISESUAIKAN DENGAN DATABASE
        $featuredGallery = GalleryItem::where('is_featured', true)
            ->orderBy('sort_order')
            ->limit(5) // Maksimal 5 item (1 featured + 4 regular)
            ->get();
        
        // Organization Structure untuk homepage - DISESUAIKAN DENGAN DATABASE
        $keyPositions = OrganizationPosition::active()
            ->orderBy('sort_order')
            ->limit(5) // Kepala Desa + 4 perangkat lainnya
            ->get();
        
        // Gallery stats untuk homepage - DISESUAIKAN DENGAN DATABASE
        $galleryStats = [
            'total_photos' => GalleryItem::where('type', 'photo')->count(),
            'total_videos' => GalleryItem::where('type', 'video')->count(),
            'total_gallery' => GalleryItem::count(),
        ];
        
        return view('welcome', compact(
            'heroContent', 
            'featuredMonument', 
            'featuredNews', 
            'latestNews',
            'activeAnnouncements',
            'upcomingEvents',
            'featuredGallery',
            'keyPositions',
            'galleryStats'
        ));
    }
}