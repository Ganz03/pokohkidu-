<?php
// app/Http/Controllers/PerangkatDesaController.php
namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $positions = PerangkatDesa::aktif()
            ->orderBy('urutan_tampil')
            ->get();

        // Statistik untuk halaman perangkat desa (menggunakan database queries untuk efisiensi)
        $baseQuery = PerangkatDesa::aktif();
        
        $statistics = [
            'total_positions' => $baseQuery->count(),
            'filled_positions' => $baseQuery->whereNotNull('nama_pejabat')
                                           ->where('nama_pejabat', '!=', '')
                                           ->count(),
            'empty_positions' => $baseQuery->where(function($query) {
                                               $query->whereNull('nama_pejabat')
                                                     ->orWhere('nama_pejabat', '');
                                           })->count(),
            'with_photos' => $baseQuery->whereNotNull('foto_path')
                                      ->where('foto_path', '!=', '')
                                      ->count(),
        ];

        return view('perangkat-desa.index', compact('positions', 'statistics'));
    }
}