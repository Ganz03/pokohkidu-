<?php
// app/Http/Controllers/OrganizationController.php
namespace App\Http\Controllers;

use App\Models\OrganizationPosition;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $positions = OrganizationPosition::active()
            ->orderBy('sort_order')
            ->get();

        return view('organization.index', compact('positions'));
    }

    public function show(OrganizationPosition $organizationPosition)
    {
        if (!$organizationPosition->is_active) {
            abort(404);
        }

        $allPositions = OrganizationPosition::active()
            ->orderBy('sort_order')
            ->get();

        return view('organization.show', compact('organizationPosition', 'allPositions'));
    }
}