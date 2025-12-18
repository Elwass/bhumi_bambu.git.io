@extends('layouts.app')

@section('content')
@php use Illuminate\\Support\\Str; @endphp
<div class="text-center mb-8">
    <h1 class="text-4xl font-bold mb-2">Bhumi Bambu Baturaden</h1>
    <p class="text-lg text-gray-200">Wisata alam, edukasi bambu, dan petualangan di tengah hijau pegunungan.</p>
</div>

<div class="grid md:grid-cols-3 gap-4">
    @foreach($packages as $package)
        <div class="bb-card p-4 rounded">
            <h3 class="text-xl font-semibold mb-2">{{ $package->title }}</h3>
            <p class="text-sm text-gray-200 mb-3 line-clamp-3">{{ Str::limit($package->description, 100) }}</p>
            <div class="flex justify-between items-center text-sm mb-3">
                <span class="bb-tag px-2 py-1 rounded">{{ ucfirst(str_replace('_', ' ', $package->category)) }}</span>
                <span class="font-semibold">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
            </div>
            <a href="{{ route('packages.public.show', $package) }}" class="bb-btn px-3 py-2 rounded inline-block text-center w-full">Lihat Paket</a>
        </div>
    @endforeach
</div>
@endsection
