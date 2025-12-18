@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Dashboard Admin</h1>
<div class="grid md:grid-cols-4 gap-4">
    <div class="bb-card p-4 rounded"><p class="text-sm text-gray-200">Total Booking</p><p class="text-2xl font-bold">{{ $totalBookings }}</p></div>
    <div class="bb-card p-4 rounded"><p class="text-sm text-gray-200">Pending</p><p class="text-2xl font-bold">{{ $pending }}</p></div>
    <div class="bb-card p-4 rounded"><p class="text-sm text-gray-200">Confirmed</p><p class="text-2xl font-bold">{{ $confirmed }}</p></div>
    <div class="bb-card p-4 rounded"><p class="text-sm text-gray-200">Revenue</p><p class="text-2xl font-bold">Rp {{ number_format($revenue, 0, ',', '.') }}</p></div>
</div>
@endsection
