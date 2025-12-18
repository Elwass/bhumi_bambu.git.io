@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bb-card p-6 rounded">
    <h1 class="text-2xl font-semibold mb-4">Masuk</h1>
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1 text-sm">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 rounded text-black" required>
        </div>
        <div>
            <label class="block mb-1 text-sm">Password</label>
            <input type="password" name="password" class="w-full p-2 rounded text-black" required>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Ingat saya</label>
        </div>
        <button type="submit" class="bb-btn px-4 py-2 rounded">Masuk</button>
    </form>
</div>
@endsection
