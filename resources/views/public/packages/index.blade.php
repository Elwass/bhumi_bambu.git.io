@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp
<h1 class="text-3xl font-semibold mb-4">Paket Wisata</h1>
<div class="grid md:grid-cols-3 gap-4">
    @forelse($packages as $package)
        <div class="bb-card p-4 rounded">
            <h3 class="text-xl font-semibold mb-2">{{ $package->title }}</h3>
            <p class="text-sm text-gray-200 mb-3">{{ Str::limit($package->description, 120) }}</p>
            <div class="flex justify-between items-center text-sm mb-3">
                <span class="bb-tag px-2 py-1 rounded">{{ ucfirst(str_replace('_', ' ', $package->category)) }}</span>
                <span class="font-semibold">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
            </div>
            <a href="{{ route('packages.public.show', $package) }}" class="bb-btn px-3 py-2 rounded inline-block text-center w-full">Detail</a>
        </div>
    @empty
        <p>Tidak ada paket tersedia.</p>
    @endforelse
</div>
<div class="mt-4">{{ $packages->links() }}</div>
@endsection
