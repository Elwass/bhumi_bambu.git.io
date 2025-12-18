@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Promo</h2>

    <form action="{{ route('promo.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Promo</label>
            <input type="text" name="nama_promo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Diskon (%)</label>
            <input type="number" name="diskon" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('promo.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
