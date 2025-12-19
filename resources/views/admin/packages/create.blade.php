@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-4">Tambah Paket</h1>
<form method="POST" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data" class="space-y-4 bb-card p-4 rounded">
    @csrf
    @include('admin.packages.partials.form', ['package' => null])
    <button type="submit" class="bb-btn px-4 py-2 rounded">Simpan</button>
</form>
@endsection
