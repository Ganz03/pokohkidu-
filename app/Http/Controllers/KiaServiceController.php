<?php

namespace App\Http\Controllers;

use App\Models\KiaService;
use Illuminate\Http\Request;

class KiaServiceController extends Controller
{
    public function index()
    {
        $services = KiaService::active()
            ->ordered()
            ->get();

        return view('services.kia.index', compact('services'));
    }

    public function show(KiaService $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        return view('services.kia.show', compact('service'));
    }
}