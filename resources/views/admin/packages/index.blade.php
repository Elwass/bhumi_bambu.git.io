@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-3xl font-semibold">Kelola Paket</h1>
    <a href="{{ route('admin.packages.create') }}" class="bb-btn px-3 py-2 rounded">Tambah Paket</a>
</div>
<div class="space-y-3">
    @forelse($packages as $package)
        <div class="bb-card p-4 rounded flex justify-between items-center">
            <div>
                <p class="text-lg font-semibold">{{ $package->title }}</p>
                <p class="text-sm text-gray-200">{{ ucfirst(str_replace('_', ' ', $package->category)) }} | Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                <p class="text-xs text-gray-300">Slug: {{ $package->slug }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.packages.slots.index', $package) }}" class="px-3 py-2 rounded bg-blue-700 text-white text-sm">Slot</a>
                <a href="{{ route('admin.packages.edit', $package) }}" class="px-3 py-2 rounded bg-yellow-600 text-white text-sm">Edit</a>
                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Hapus paket?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-2 rounded bg-red-700 text-white text-sm">Hapus</button>
                </form>
            </div>
        </div>
    @empty
        <p>Belum ada paket.</p>
    @endforelse
</div>
<div class="mt-4">{{ $packages->links() }}</div>
@endsection
