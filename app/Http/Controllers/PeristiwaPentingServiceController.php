<?php

namespace App\Http\Controllers;

use App\Models\PeristiwaPentingService;
use Illuminate\Http\Request;

class PeristiwaPentingServiceController extends Controller
{
    public function index()
    {
        $services = PeristiwaPentingService::active()
            ->ordered()
            ->get();

        return view('services.peristiwa-penting.index', compact('services'));
    }

    public function show(PeristiwaPentingService $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        return view('services.peristiwa-penting.show', compact('service'));
    }
}