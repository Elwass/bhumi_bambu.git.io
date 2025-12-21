<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhumi Bambu Baturaden</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen @yield('body_class')">
<div class="min-h-screen flex flex-col">
    <nav class="main-nav bg-[#0f1f19] border-b border-[#1f3d32] @yield('nav_class')">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('landing') }}" class="flex items-center gap-3 text-xl font-semibold">
                <img src="{{ asset('assets/logo.png') }}" alt="Bhumi Bambu" class="h-10 w-auto">
            </a>
            <div class="flex gap-4 items-center text-sm">
                <a href="{{ route('landing') }}" class="hover:underline">Beranda</a>
                <a href="#highlighted" class="hover:underline">Layanan</a>
                <a href="#about" class="hover:underline">Tentang</a>
                <a href="#help" class="hover:underline">Bantuan</a>
                @auth
                    <a href="{{ route('bookings.index') }}" class="hover:underline">Booking Saya</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="hover:underline">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline cta-link">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="cta-link">Masuk</a>
                    <a href="{{ route('register') }}" class="cta-link">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-1 max-w-7xl mx-auto w-full px-4 py-6">
        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-green-800 text-green-100">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="mb-4 p-3 rounded bg-red-800 text-red-100">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-[#0f1f19] border-t border-[#1f3d32] text-center py-4 text-sm text-gray-300">
        &copy; {{ date('Y') }} Bhumi Bambu Baturaden. Semua hak dilindungi.
    </footer>
</div>
</body>
</html>
