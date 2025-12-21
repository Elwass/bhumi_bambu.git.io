<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function __invoke(): View
    {
        $totalBookings = Booking::count();
        $pending = Booking::where('status', 'pending')->count();
        $confirmed = Booking::where('status', 'confirmed')->count();
        $revenue = Payment::where('status', 'verified')->sum('amount');

        return view('admin.dashboard', compact('totalBookings', 'pending', 'confirmed', 'revenue'));
    }
}
