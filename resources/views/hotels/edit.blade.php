@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hotel {{ $hotel->nama_hotel }}</h2>

    <form action="{{ route('hotels.update', $hotel) }}" method="POST" class="container">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_hotel" class="form-label">Nama Hotel</label>
            <input type="text" class="form-control" id="nama_hotel" name="nama_hotel" value="{{ $hotel->nama_hotel }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $hotel->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" value="{{ $hotel->kota }}" required>
        </div>

        <div class="mb-3">
            <label for="bintang" class="form-label">Bintang</label>
            <select class="form-select" id="bintang" name="bintang" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $hotel->bintang == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ $hotel->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Kembali</a>


    </form>
</div>
@endsection