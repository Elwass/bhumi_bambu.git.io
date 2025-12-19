@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-semibold mb-4">Edit Paket</h1>
<form method="POST" action="{{ route('admin.packages.update', $package) }}" enctype="multipart/form-data" class="space-y-4 bb-card p-4 rounded">
    @csrf
    @method('PUT')
    @include('admin.packages.partials.form', ['package' => $package])
    <button type="submit" class="bb-btn px-4 py-2 rounded">Update</button>
</form>
@endsection
