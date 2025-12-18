@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-4">Daftar Booking</h1>
<table class="w-full text-sm bb-card rounded overflow-hidden">
    <thead class="bg-[#152922]">
        <tr>
            <th class="p-2 text-left">Kode</th>
            <th class="p-2 text-left">Paket</th>
            <th class="p-2 text-left">User</th>
            <th class="p-2 text-left">Tanggal</th>
            <th class="p-2 text-left">Qty</th>
            <th class="p-2 text-left">Total</th>
            <th class="p-2 text-left">Status</th>
            <th class="p-2 text-left">Pembayaran</th>
            <th class="p-2 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($bookings as $booking)
        <tr class="border-t border-[#1f3d32]">
            <td class="p-2">{{ $booking->booking_code }}</td>
            <td class="p-2">{{ $booking->package->title }}</td>
            <td class="p-2">{{ $booking->user->name }}</td>
            <td class="p-2">{{ $booking->slot->date->format('d M Y') }}</td>
            <td class="p-2">{{ $booking->qty }}</td>
            <td class="p-2">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
            <td class="p-2">{{ ucfirst($booking->status) }}</td>
            <td class="p-2">
                @if($booking->payment)
                    <div>Status: {{ ucfirst($booking->payment->status) }}</div>
                    @if($booking->payment->proof_image)
                        <a href="{{ asset('storage/' . $booking->payment->proof_image) }}" target="_blank" class="underline">Bukti</a>
                    @endif
                    <form method="POST" action="{{ route('admin.payments.verify', $booking->payment) }}" class="mt-2 flex gap-2">
                        @csrf
                        <select name="status" class="text-black p-1 rounded text-sm">
                            <option value="verified">Verifikasi</option>
                            <option value="rejected">Tolak</option>
                        </select>
                        <button class="px-3 py-1 rounded bg-green-700 text-white text-sm">Kirim</button>
                    </form>
                @else
                    <span class="text-xs">Belum ada pembayaran</span>
                @endif
            </td>
            <td class="p-2">
                <form method="POST" action="{{ route('admin.bookings.status', $booking) }}" class="flex gap-2">
                    @csrf
                    <select name="status" class="text-black p-1 rounded text-sm">
                        @foreach(['pending','confirmed','cancelled','completed'] as $status)
                            <option value="{{ $status }}" @selected($booking->status === $status)> {{ ucfirst($status) }} </option>
                        @endforeach
                    </select>
                    <button class="px-3 py-1 rounded bg-blue-700 text-white text-sm">Update</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td class="p-3" colspan="9">Belum ada data.</td></tr>
    @endforelse
    </tbody>
</table>
<div class="mt-4">{{ $bookings->links() }}</div>
@endsection
