<?php

namespace App\Http\Controllers;

use App\Models\KkService;
use Illuminate\Http\Request;

class KkServiceController extends Controller
{
    public function index()
    {
        $services = KkService::active()
            ->ordered()
            ->get();

        return view('services.kk.index', compact('services'));
    }

    public function show(KkService $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        return view('services.kk.show', compact('service'));
    }
}