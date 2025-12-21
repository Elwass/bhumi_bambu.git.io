@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Slot - {{ $package->title }}</h1>
<form method="POST" action="{{ route('admin.packages.slots.update', [$package, $slot]) }}" class="space-y-4 bb-card p-4 rounded">
    @csrf
    @method('PUT')
    <div>
        <label class="block mb-1 text-sm">Tanggal</label>
        <input type="date" name="date" value="{{ old('date', $slot->date->format('Y-m-d')) }}" class="w-full p-2 rounded text-black" required>
    </div>
    <div>
        <label class="block mb-1 text-sm">Kuota</label>
        <input type="number" name="quota" min="1" value="{{ old('quota', $slot->quota) }}" class="w-full p-2 rounded text-black" required>
    </div>
    <div>
        <label class="block mb-1 text-sm">Terbooking</label>
        <input type="number" name="booked_count" min="0" value="{{ old('booked_count', $slot->booked_count) }}" class="w-full p-2 rounded text-black">
    </div>
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_open" value="1" id="is_open" @checked(old('is_open', $slot->is_open))>
        <label for="is_open">Buka</label>
    </div>
    <button type="submit" class="bb-btn px-4 py-2 rounded">Update</button>
</form>
@endsection
