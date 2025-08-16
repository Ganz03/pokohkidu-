<?php
// app/Http/Controllers/GalleryController.php
namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryItem::query()->orderBy('sort_order');

        // Filter berdasarkan tipe
        if ($request->has('type') && in_array($request->type, ['photo', 'video'])) {
            $query->where('type', $request->type);
        }

        $galleryItems = $query->paginate(12);
        
        $stats = [
            'total_photos' => GalleryItem::where('type', 'photo')->count(),
            'total_videos' => GalleryItem::where('type', 'video')->count(),
        ];

        return view('gallery.index', compact('galleryItems', 'stats'));
    }

    public function show(GalleryItem $galleryItem)
    {
        return view('gallery.show', compact('galleryItem'));
    }
}