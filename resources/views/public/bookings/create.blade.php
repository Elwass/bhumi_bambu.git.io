@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Booking: {{ $package->title }}</h1>
<form method="POST" action="{{ route('bookings.store') }}" class="space-y-4 bb-card p-4 rounded">
    @csrf
    <input type="hidden" name="package_id" value="{{ $package->id }}">
    <div>
        <label class="block mb-1 text-sm">Pilih Tanggal</label>
        <select name="package_slot_id" class="w-full p-2 rounded text-black" required>
            <option value="">-- Pilih slot --</option>
            @foreach($slots as $slot)
                <option value="{{ $slot->id }}">{{ $slot->date->format('d M Y') }} (sisa {{ $slot->quota - $slot->booked_count }})</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block mb-1 text-sm">Jumlah Peserta</label>
        <input type="number" name="qty" min="1" value="{{ old('qty', 1) }}" class="w-full p-2 rounded text-black" required>
    </div>
    <div>
        <label class="block mb-1 text-sm">Catatan</label>
        <textarea name="notes" class="w-full p-2 rounded text-black" rows="3">{{ old('notes') }}</textarea>
    </div>
    <button type="submit" class="bb-btn px-4 py-2 rounded">Submit Booking</button>
</form>
@endsection
