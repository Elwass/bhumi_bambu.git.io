<?php

namespace App\Http\Controllers;

use App\Models\PaketLayanan;
use App\Models\Promo;
use App\Models\Feedback;

class LandingPageController extends Controller
{
    public function index()
    {
        $pakets = PaketLayanan::take(3)->get();

        $promos = Promo::where('tanggal_selesai', '>', now())->get();

        $feedbacks = Feedback::latest()->take(3)->get();

        return view('LandingPage.index', compact('pakets', 'promos', 'feedbacks'));
    }
}
