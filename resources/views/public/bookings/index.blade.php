@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-4">Riwayat Booking</h1>
<div class="space-y-3">
    @forelse($bookings as $booking)
        <div class="bb-card p-4 rounded">
            <div class="flex justify-between mb-2">
                <div>
                    <p class="font-semibold">{{ $booking->package->title }}</p>
                    <p class="text-sm text-gray-200">Kode: {{ $booking->booking_code }}</p>
                </div>
                <span class="bb-tag px-2 py-1 rounded">{{ ucfirst($booking->status) }}</span>
            </div>
            <p class="text-sm">Tanggal: {{ $booking->slot->date->format('d M Y') }}</p>
            <p class="text-sm">Qty: {{ $booking->qty }} | Total: Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
            <a href="{{ route('bookings.show', $booking) }}" class="underline text-sm">Detail</a>
        </div>
    @empty
        <p>Belum ada booking.</p>
    @endforelse
</div>
<div class="mt-4">{{ $bookings->links() }}</div>
@endsection
