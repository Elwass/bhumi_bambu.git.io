@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Promo</h2>

    {{-- NOTIFIKASI ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promo.update', $promo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Promo</label>
            <input type="text" name="nama_promo" class="form-control" value="{{ $promo->nama_promo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $promo->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $promo->tanggal_mulai }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $promo->tanggal_selesai }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Diskon (%)</label>
            <input type="number" name="diskon" class="form-control" value="{{ $promo->diskon }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('promo.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
