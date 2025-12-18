<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function create(Booking $booking): View
    {
        $this->authorizeBooking($booking);
        return view('public.payments.create', compact('booking'));
    }

    public function store(StorePaymentRequest $request, Booking $booking): RedirectResponse
    {
        $this->authorizeBooking($booking);

        $data = $request->validated();
        $data['booking_id'] = $booking->id;
        $data['status'] = 'waiting';

        if ($request->hasFile('proof_image')) {
            $data['proof_image'] = $request->file('proof_image')->store('payments', 'public');
        }

        $payment = $booking->payment()->updateOrCreate(
            ['booking_id' => $booking->id],
            $data
        );

        return redirect()->route('bookings.show', $booking)->with('success', 'Bukti pembayaran dikirim.');
    }

    public function verify(Payment $payment): RedirectResponse
    {
        request()->validate([
            'status' => 'required|in:verified,rejected',
        ]);

        DB::transaction(function () use ($payment) {
            $status = request('status');
            $payment->update([
                'status' => $status,
                'paid_at' => $status === 'verified' ? now() : $payment->paid_at,
            ]);

            $payment->booking()->update([
                'status' => $status === 'verified' ? 'confirmed' : 'pending',
            ]);
        });

        return back()->with('success', 'Pembayaran diperbarui.');
    }

    protected function authorizeBooking(Booking $booking): void
    {
        $user = Auth::user();
        if ($user?->role !== 'admin' && $booking->user_id !== $user?->id) {
            abort(403);
        }
    }
}
