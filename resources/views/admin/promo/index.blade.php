@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Promo</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('promo.create') }}" class="btn btn-primary mb-3">
        + Tambah Promo
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Promo</th>
                <th>Diskon</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($promos as $promo)
            <tr>
                <td>{{ $promo->nama_promo }}</td>
                <td>{{ $promo->diskon }}%</td>
                <td>
                    {{ $promo->tanggal_mulai }} <br>
                    {{ $promo->tanggal_selesai }}
                </td>
                <td>
                    @if(now()->between($promo->tanggal_mulai, $promo->tanggal_selesai))
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-secondary">Nonaktif</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('promo.edit', $promo->id) }}"
                       class="btn btn-sm btn-warning">
                        ✏️ Edit
                    </a>

                    <form action="{{ route('promo.destroy', $promo->id) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah promo ini akan dihapus?')">
                            🗑 Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
