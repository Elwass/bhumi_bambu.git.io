@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-2">{{ $package->title }}</h1>
<p class="text-sm text-gray-200 mb-2">Kategori: {{ ucfirst(str_replace('_', ' ', $package->category)) }} | Durasi: {{ $package->duration }}</p>
<p class="mb-4 text-gray-100">{{ $package->description }}</p>
<div class="mb-4">
    <h3 class="font-semibold">Lokasi</h3>
    <p>{{ $package->location }}</p>
</div>
<div class="mb-4">
    <h3 class="font-semibold">Fasilitas</h3>
    <p>{{ $package->facilities }}</p>
</div>
<p class="text-xl font-bold mb-4">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
@if($slots->count())
    <div class="mb-4">
        <h3 class="font-semibold mb-2">Slot Tersedia</h3>
        <ul class="space-y-2">
            @foreach($slots as $slot)
                <li class="flex justify-between bb-card p-3 rounded">
                    <span>{{ $slot->date->format('d M Y') }}</span>
                    <span>Sisa {{ $slot->quota - $slot->booked_count }} dari {{ $slot->quota }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endif
@auth
    <a href="{{ route('bookings.create', $package) }}" class="bb-btn px-4 py-2 rounded">Booking sekarang</a>
@else
    <a href="{{ route('login') }}" class="bb-btn px-4 py-2 rounded">Masuk untuk booking</a>
@endauth
@endsection
