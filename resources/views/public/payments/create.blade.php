@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Upload Bukti Pembayaran</h1>
<form method="POST" action="{{ route('payments.store', $booking) }}" enctype="multipart/form-data" class="space-y-4 bb-card p-4 rounded">
    @csrf
    <div>
        <label class="block mb-1 text-sm">Metode</label>
        <select name="method" class="w-full p-2 rounded text-black" required>
            <option value="transfer">Transfer</option>
            <option value="cash">Cash</option>
        </select>
    </div>
    <div>
        <label class="block mb-1 text-sm">Jumlah</label>
        <input type="number" step="0.01" name="amount" value="{{ old('amount', $booking->total_price) }}" class="w-full p-2 rounded text-black" required>
    </div>
    <div>
        <label class="block mb-1 text-sm">Bukti Pembayaran</label>
        <input type="file" name="proof_image" class="w-full text-sm" accept="image/*">
    </div>
    <button type="submit" class="bb-btn px-4 py-2 rounded">Kirim</button>
</form>
@endsection
