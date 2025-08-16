<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::getActive();
        
        if (!$aboutPage) {
            abort(404, 'Halaman Tentang Kami tidak ditemukan');
        }
        
        return view('about.index', compact('aboutPage'));
    }
}
