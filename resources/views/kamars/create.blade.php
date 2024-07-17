@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kamar Baru</h2>

    <form action="{{ route('kamars.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="hotel_id">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-control" required>
                <option value="">Pilih Hotel</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->nama_hotel }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nomor_kamar">Nomor Kamar</label>
            <input type="text" name="nomor_kamar" id="nomor_kamar" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tipe_kamar">Tipe Kamar</label>
            <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Tambah Kamar</button>
    </form>
</div>
@endsection