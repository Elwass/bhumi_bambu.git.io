@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <div>
        <h1 class="text-2xl font-semibold">Slot: {{ $package->title }}</h1>
        <p class="text-sm text-gray-200">Kelola kuota dan jadwal</p>
    </div>
    <a href="{{ route('admin.packages.slots.create', $package) }}" class="bb-btn px-3 py-2 rounded">Tambah Slot</a>
</div>
<table class="w-full text-sm bb-card rounded overflow-hidden">
    <thead class="bg-[#152922]">
        <tr>
            <th class="p-2 text-left">Tanggal</th>
            <th class="p-2 text-left">Kuota</th>
            <th class="p-2 text-left">Terbooking</th>
            <th class="p-2 text-left">Buka</th>
            <th class="p-2 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse($slots as $slot)
        <tr class="border-t border-[#1f3d32]">
            <td class="p-2">{{ $slot->date->format('d M Y') }}</td>
            <td class="p-2">{{ $slot->quota }}</td>
            <td class="p-2">{{ $slot->booked_count }}</td>
            <td class="p-2">{{ $slot->is_open ? 'Ya' : 'Tidak' }}</td>
            <td class="p-2 flex gap-2">
                <a href="{{ route('admin.packages.slots.edit', [$package, $slot]) }}" class="px-3 py-1 rounded bg-yellow-600 text-white">Edit</a>
                <form action="{{ route('admin.packages.slots.destroy', [$package, $slot]) }}" method="POST" onsubmit="return confirm('Hapus slot?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1 rounded bg-red-700 text-white">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td class="p-3" colspan="5">Belum ada slot.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
