<?php

namespace App\Http\Controllers;

use App\Models\PotensiDesa;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        
        $potensiDesa = PotensiDesa::active()
            ->byYear($tahun)
            ->first();
        
        // Jika data tidak ada untuk tahun yang dipilih, ambil data tahun terbaru
        if (!$potensiDesa) {
            $potensiDesa = PotensiDesa::active()
                ->orderBy('tahun', 'desc')
                ->first();
        }
        
        // Get available years
        $availableYears = PotensiDesa::active()
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('potensi-desa.index', compact('potensiDesa', 'availableYears', 'tahun'));
    }
}