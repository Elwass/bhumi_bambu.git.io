<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Package;
use App\Models\PackageSlot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $query = Booking::with(['package', 'slot', 'payment', 'user'])->latest();

        if ($user?->role !== 'admin') {
            $query->where('user_id', $user?->id);
        }

        $bookings = $query->paginate(10);

        return view($user?->role === 'admin' ? 'admin.bookings.index' : 'public.bookings.index', compact('bookings'));
    }

    public function create(Package $package): View
    {
        abort_unless($package->is_active, 404);
        $slots = $package->slots()->where('is_open', true)->orderBy('date')->get();
        return view('public.bookings.create', compact('package', 'slots'));
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $user = $request->user();
        $package = Package::findOrFail($request->package_id);
        $booking = null;

        DB::transaction(function () use ($request, $package, &$booking, $user) {
            $slot = PackageSlot::where('id', $request->package_slot_id)
                ->where('is_open', true)
                ->lockForUpdate()
                ->firstOrFail();

            if ($slot->package_id !== $package->id) {
                throw ValidationException::withMessages([
                    'package_slot_id' => 'Slot tidak sesuai dengan paket yang dipilih.',
                ]);
            }

            if ($slot->booked_count + $request->qty > $slot->quota) {
                throw ValidationException::withMessages([
                    'qty' => 'Kuota tidak mencukupi.',
                ]);
            }

            $totalPrice = $package->price * $request->qty;

            $booking = Booking::create([
                'user_id' => $user->id,
                'package_id' => $package->id,
                'package_slot_id' => $slot->id,
                'booking_code' => $this->generateBookingCode(),
                'qty' => $request->qty,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'notes' => $request->notes,
            ]);

            $slot->increment('booked_count', $request->qty);
        });

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking berhasil dibuat.');
    }

    public function show(Booking $booking): View
    {
        $this->authorizeBooking($booking);
        $booking->load(['package', 'slot', 'payment']);
        return view('public.bookings.show', compact('booking'));
    }

    public function adminIndex(): View
    {
        $bookings = Booking::with(['package', 'slot', 'user', 'payment'])->latest()->paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Booking $booking): RedirectResponse
    {
        request()->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);

        $booking->update(['status' => request('status')]);

        return back()->with('success', 'Status booking diperbarui.');
    }

    protected function authorizeBooking(Booking $booking): void
    {
        $user = Auth::user();
        if ($user?->role !== 'admin' && $booking->user_id !== $user?->id) {
            abort(403);
        }
    }

    protected function generateBookingCode(): string
    {
        $sequence = str_pad((string) (Booking::count() + 1), 4, '0', STR_PAD_LEFT);
        return 'BB-' . now()->format('Ymd') . '-' . $sequence;
    }
}
