<?php

namespace App\Http\Controllers;

use App\Models\KtpService;
use Illuminate\Http\Request;

class KtpServiceController extends Controller
{
    public function index()
    {
        $services = KtpService::active()
            ->ordered()
            ->get();

        return view('services.ktp.index', compact('services'));
    }

    public function show(KtpService $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        return view('services.ktp.show', compact('service'));
    }
}