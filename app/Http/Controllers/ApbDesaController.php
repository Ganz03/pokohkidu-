<?php

namespace App\Http\Controllers;

use App\Models\ApbDesa;
use Illuminate\Http\Request;

class ApbDesaController extends Controller
{
    public function index()
    {
        $apbDesas = ApbDesa::published()
            ->orderBy('tahun', 'desc')
            ->orderBy('tanggal_publikasi', 'desc')
            ->get();

        return view('apbdesa.index', compact('apbDesas'));
    }

    public function show(ApbDesa $apbDesa)
    {
        if (!$apbDesa->is_published) {
            abort(404);
        }

        return view('apbdesa.show', compact('apbDesa'));
    }
}