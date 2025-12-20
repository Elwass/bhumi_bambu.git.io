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

<section id="services" class="section bg-[#0f1f19] bg-opacity-95 border-t border-[#1f3d32]">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">Layanan Bhumi Bambu</h2>
        <p class="section-subtitle">Pilihan layanan lengkap untuk pengalaman alam, gathering, dan edukasi.</p>
        <div class="card-grid card-grid-3">
            @foreach($services as $service)
                <div class="service-card">
                    <div class="service-icon mb-3">{{ $service['icon'] }}</div>
                    <h3 class="font-semibold text-lg mb-2">{{ $service['title'] }}</h3>
                    <p class="text-sm text-gray-200">{{ $service['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="venues" class="section bg-[#0f1f19] bg-opacity-95 border-t border-[#1f3d32]">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">Venue</h2>
        <p class="section-subtitle">Pilih venue sesuai kebutuhan acara Anda.</p>
        <div class="card-grid card-grid-3">
            @foreach($venues as $venue)
                <div class="venue-card">
                    <h3 class="font-semibold text-lg mb-2">{{ $venue['title'] }}</h3>
                    <p class="text-sm text-gray-200 mb-2">{{ $venue['desc'] }}</p>
                    <p class="text-xs text-gray-300">Fitur: {{ $venue['features'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="highlighted" class="bg-[#0f1f19] bg-opacity-95 border-t border-[#1f3d32] mt-14">
    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex items-baseline justify-between mb-6 px-1">
            <h2 class="text-2xl font-semibold">Paket Unggulan</h2>
            <a href="{{ route('packages.public.index') }}" class="text-sm underline">Semua Paket</a>
        </div>
        <div class="grid md:grid-cols-3 gap-4">
            @forelse($packages as $package)
                <div class="bb-card p-4 rounded shadow-md shadow-black/20">
                    <h3 class="text-xl font-semibold mb-2">{{ $package->title }}</h3>
                    <p class="text-sm text-gray-200 mb-3 line-clamp-3">{{ Str::limit($package->description, 110) }}</p>
                    <div class="flex justify-between items-center text-sm mb-3">
                        <span class="bb-tag px-2 py-1 rounded">{{ ucfirst(str_replace('_', ' ', $package->category)) }}</span>
                        <span class="font-semibold">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('packages.public.show', $package) }}" class="bb-btn px-3 py-2 rounded inline-block text-center w-full">Lihat Paket</a>
                </div>
            @empty
                @php
                    $placeholderPackages = [
                        ['title' => 'Gathering Bamboo Lounge', 'description' => 'Venue semi-outdoor berpadu bambu alami untuk acara privat hingga 50 pax.', 'price' => 500000, 'category' => 'event'],
                        ['title' => 'Edukasi Bambu & Workshop', 'description' => 'Sesi belajar bambu, demo kerajinan, dan tur kebun bambu.', 'price' => 250000, 'category' => 'bamboo_education'],
                        ['title' => 'Sunrise Camping Ridge', 'description' => 'Camping spot dengan view matahari terbit dan api unggun malam hari.', 'price' => 300000, 'category' => 'camping'],
                    ];
                @endphp
                @foreach($placeholderPackages as $sample)
                    <div class="bb-card p-4 rounded shadow-md shadow-black/20">
                        <h3 class="text-xl font-semibold mb-2">{{ $sample['title'] }}</h3>
                        <p class="text-sm text-gray-200 mb-3 line-clamp-3">{{ $sample['description'] }}</p>
                        <div class="flex justify-between items-center text-sm mb-3">
                            <span class="bb-tag px-2 py-1 rounded">{{ ucfirst(str_replace('_', ' ', $sample['category'])) }}</span>
                            <span class="font-semibold">Rp {{ number_format($sample['price'], 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('packages.public.index') }}" class="bb-btn px-3 py-2 rounded inline-block text-center w-full">Lihat Paket</a>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>

<section id="reviews" class="section bg-[#0f1f19] bg-opacity-95 border-t border-[#1f3d32]">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">Review Pengunjung</h2>
        <p class="section-subtitle">Testimoni asli yang tersimpan di sistem.</p>
        <div class="card-grid card-grid-3">
            @forelse($reviews as $review)
                <div class="review-card">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-semibold">{{ $review->name }}</h3>
                        <span class="rating">{{ str_repeat('★', $review->rating) }}</span>
                    </div>
                    @if($review->role)
                        <p class="text-xs text-gray-300 mb-2">{{ $review->role }}</p>
                    @endif
                    <p class="text-sm text-gray-200">{{ $review->message }}</p>
                </div>
            @empty
                <div class="review-card">
                    <h3 class="font-semibold">Belum ada review</h3>
                    <p class="text-sm text-gray-200">Jadilah yang pertama memberikan kesan setelah melakukan reservasi.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
