<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\View\View;

class PublicPackageController extends Controller
{
    public function landing(): View
    {
        $packages = Package::where('is_active', true)->latest()->take(3)->get();
        return view('public.landing', compact('packages'));
    }

    public function index(): View
    {
        $packages = Package::where('is_active', true)->latest()->paginate(9);
        return view('public.packages.index', compact('packages'));
    }

    public function show(Package $package): View
    {
        abort_unless($package->is_active, 404);
        $slots = $package->slots()->where('is_open', true)->orderBy('date')->get();
        return view('public.packages.show', compact('package', 'slots'));
    }
}
