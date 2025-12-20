<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Review;
use Illuminate\View\View;

class PublicPackageController extends Controller
{
    public function landing(): View
    {
        $packages = Package::where('is_active', true)->latest()->take(3)->get();
        $services = [
            ['title' => 'Venue & Gathering', 'desc' => 'Ruang semi-outdoor bertema bambu untuk acara privat, gathering, dan perayaan.', 'icon' => '🏕️'],
            ['title' => 'Outbound & Camping', 'desc' => 'Aktivitas tim, fun games, dan camping dengan view alam pegunungan.', 'icon' => '⛺'],
            ['title' => 'Edukasi Bambu', 'desc' => 'Tur kebun bambu, workshop kerajinan, dan sesi sustainability.', 'icon' => '🎋'],
        ];

        $venues = [
            ['title' => 'Bamboo Lounge', 'desc' => 'Venue elegan untuk 30-80 pax, cocok untuk resepsi atau gala dinner.', 'features' => 'Lighting hangat, sound system, dekor bambu.'],
            ['title' => 'Forest Deck', 'desc' => 'Deck kayu terbuka dengan panorama hijau, ideal untuk acara intimate.', 'features' => 'Pencahayaan malam, listrik, area api unggun.'],
            ['title' => 'Learning Studio', 'desc' => 'Ruang kelas bambu untuk workshop, edukasi, dan pelatihan.', 'features' => 'Meja kursi, proyektor, area praktek kerajinan.'],
        ];

        $reviews = Review::latest()->take(6)->get();

        return view('public.landing', compact('packages', 'services', 'venues', 'reviews'));
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
