@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Hotel {{ $hotel->nama_hotel }}</h1>

    <ul>
        <li>Alamat: {{ $hotel->alamat }}</li>
        <li>Kota: {{ $hotel->kota }}</li>
        <li>Bintang: {{ $hotel->bintang }}</li>
        <li>Deskripsi: {{ $hotel->deskripsi }}</li>
    </ul>

    <h2>Daftar Kamar</h2>

    <ul>
        @foreach ($hotel->kamars as $kamar)
            <li><a href="{{ route('kamars.show', [$hotel->id, $kamar->id]) }}">{{ $kamar->tipe_kamar }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('hotels.index') }}" class="btn btn-primary">Kembali ke Daftar Hotel</a>
    <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-warning">Edit Hotel</a>

    @can('hotels.destroy')
        <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus Hotel</button>
        </form>
    @endcan
</div>
@endsection
