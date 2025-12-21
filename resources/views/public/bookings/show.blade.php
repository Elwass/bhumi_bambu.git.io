@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-2">Detail Booking</h1>
<div class="bb-card p-4 rounded space-y-2 mb-4">
    <p><strong>Kode:</strong> {{ $booking->booking_code }}</p>
    <p><strong>Paket:</strong> {{ $booking->package->title }}</p>
    <p><strong>Tanggal:</strong> {{ $booking->slot->date->format('d M Y') }}</p>
    <p><strong>Qty:</strong> {{ $booking->qty }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
    @if($booking->notes)
        <p><strong>Catatan:</strong> {{ $booking->notes }}</p>
    @endif
</div>

@if($booking->payment)
    <div class="bb-card p-4 rounded mb-4">
        <h3 class="font-semibold mb-2">Pembayaran</h3>
        <p>Metode: {{ ucfirst($booking->payment->method) }}</p>
        <p>Jumlah: Rp {{ number_format($booking->payment->amount, 0, ',', '.') }}</p>
        <p>Status: {{ ucfirst($booking->payment->status) }}</p>
        @if($booking->payment->proof_image)
            <a href="{{ asset('storage/' . $booking->payment->proof_image) }}" target="_blank" class="underline">Lihat bukti</a>
        @endif
    </div>
@else
    <a href="{{ route('payments.create', $booking) }}" class="bb-btn px-4 py-2 rounded">Upload Bukti Pembayaran</a>
@endif
@endsection
