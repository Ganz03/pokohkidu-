<?php
// app/Http/Controllers/LembagaDesaController.php

namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class LembagaDesaController extends Controller
{
    public function index()
    {
        $lembagaList = LembagaDesa::aktif()
            ->urutanTampil()
            ->withCount(['pengurus', 'pengurusAktif'])
            ->get();

        return view('lembaga-desa.index', compact('lembagaList'));
    }

    public function show(LembagaDesa $lembaga)
    {
        $lembaga->load(['pengurusAktif' => function($query) {
            $query->orderBy('urutan_tampil');
        }]);

        // Statistik lembaga
        $statistics = [
            'total_pengurus' => $lembaga->pengurus()->count(),
            'pengurus_aktif' => $lembaga->pengurusAktif()->count(),
            'pengurus_s1_keatas' => $lembaga->pengurusAktif()->whereIn('pendidikan', ['S1', 'S2', 'S3'])->count(),
            'rata_rata_masa_jabatan' => $this->getRataRataMasaJabatan($lembaga),
        ];

        return view('lembaga-desa.detail', compact('lembaga', 'statistics'));
    }

    private function getRataRataMasaJabatan(LembagaDesa $lembaga)
    {
        $pengurus = $lembaga->pengurusAktif()
            ->whereNotNull('tanggal_mulai_jabatan')
            ->get();

        if ($pengurus->isEmpty()) {
            return 0;
        }

        $totalBulan = 0;
        foreach ($pengurus as $p) {
            $mulai = \Carbon\Carbon::parse($p->tanggal_mulai_jabatan);
            $akhir = $p->tanggal_berakhir_jabatan 
                ? \Carbon\Carbon::parse($p->tanggal_berakhir_jabatan) 
                : \Carbon\Carbon::now();
            
            $totalBulan += $mulai->diffInMonths($akhir);
        }

        $rataBulan = $totalBulan / $pengurus->count();
        $tahun = floor($rataBulan / 12);
        $bulan = $rataBulan % 12;

        if ($tahun > 0) {
            return $tahun . ' tahun ' . round($bulan) . ' bulan';
        } else {
            return round($rataBulan) . ' bulan';
        }
    }
}