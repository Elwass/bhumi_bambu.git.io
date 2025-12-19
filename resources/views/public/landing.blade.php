@extends('layouts.app')

@section('body_class', 'landing')
@section('nav_class', 'absolute w-full border-none bg-transparent')

@section('content')
@php use Illuminate\Support\Str; @endphp
<section class="hero" style="background-image: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=2000&q=80');">
    <div class="hero-content">
        <div class="hero-card">
            <div class="flex justify-start mb-6">
                <img src="{{ asset('images/bhumi-logo.svg') }}" alt="Bhumi Bambu" class="h-14 drop-shadow-lg">
            </div>
            <p class="uppercase tracking-wide text-sm text-gray-200 mb-2 font-semibold">Wujudkan Momen</p>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-3">Tak Terlupakan di Bhumi Bambu Baturaden</h1>
            <p class="hero-tagline mb-5">Destinasi elegan untuk perayaan istimewa Anda, berpadu harmonis dengan keindahan alam.</p>
            <a href="{{ route('packages.public.index') }}" class="bb-btn px-6 py-3 rounded-full text-base inline-block">Reservasi Venue Sekarang</a>
        </div>
    </div>
</section>

<section id="highlighted" class="max-w-7xl mx-auto mt-10">
    <div class="flex items-baseline justify-between mb-4 px-1">
        <h2 class="text-2xl font-semibold">Paket Unggulan</h2>
        <a href="{{ route('packages.public.index') }}" class="text-sm underline">Semua Paket</a>
    </div>
    <div class="grid md:grid-cols-3 gap-4">
        @foreach($packages as $package)
            <div class="bb-card p-4 rounded shadow-md shadow-black/20">
                <h3 class="text-xl font-semibold mb-2">{{ $package->title }}</h3>
                <p class="text-sm text-gray-200 mb-3 line-clamp-3">{{ Str::limit($package->description, 110) }}</p>
                <div class="flex justify-between items-center text-sm mb-3">
                    <span class="bb-tag px-2 py-1 rounded">{{ ucfirst(str_replace('_', ' ', $package->category)) }}</span>
                    <span class="font-semibold">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                </div>
                <a href="{{ route('packages.public.show', $package) }}" class="bb-btn px-3 py-2 rounded inline-block text-center w-full">Lihat Paket</a>
            </div>
        @endforeach
    </div>
</section>
@endsection
