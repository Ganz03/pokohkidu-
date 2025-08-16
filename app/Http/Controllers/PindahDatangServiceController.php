<?php

namespace App\Http\Controllers;

use App\Models\PindahDatangService;
use Illuminate\Http\Request;

class PindahDatangServiceController extends Controller
{
    public function index()
    {
        $services = PindahDatangService::active()
            ->ordered()
            ->get();

        return view('services.pindah-datang.index', compact('services'));
    }

    public function show(PindahDatangService $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        return view('services.pindah-datang.show', compact('service'));
    }
}