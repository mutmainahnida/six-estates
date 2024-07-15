@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Hotel Baru</h2>

    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_hotel" class="form-label">Nama Hotel</label>
            <input type="text" class="form-control" id="nama_hotel" name="nama_hotel" required>
        </div>
        <div class="form-group">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" required>
        </div>
        <div class="form-group">
            <label for="bintang" class="form-label">Bintang</label>
            <input type="number" class="form-control" id="bintang" name="bintang" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('hotels.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
