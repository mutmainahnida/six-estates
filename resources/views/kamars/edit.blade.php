@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Kamar - {{ $kamar->tipe_kamar }}</h2>  <form action="{{ route('kamars.update', $kamar) }}" method="POST" class="container">
    @csrf
    @method('PUT')  <div class="mb-3">
      <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
      <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" value="{{ old('tipe_kamar', $kamar->tipe_kamar) }}" required>
    </div>
    @extends('layouts.app')

    @section('content')
    <div class="container">
      <h2>Edit Kamar</h2>
    
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    
      <form action="{{ route('kamars.update', $kamar->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group">
          <label for="hotel_id">Nama Hotel</label>
          <select name="hotel_id" id="hotel_id" class="form-control" required>
            @foreach($hotels as $hotel)
              <option value="{{ $hotel->id }}" {{ $kamar->hotel_id == $hotel->id ? 'selected' : '' }}>{{ $hotel->nama_hotel }}</option>
            @endforeach
          </select>
        </div>
    
        <div class="form-group">
          <label for="nomor_kamar">Nomor Kamar</label>
          <input type="text" name="nomor_kamar" id="nomor_kamar" class="form-control" value="{{ $kamar->nomor_kamar }}" readonly>
        </div>
    
        <div class="form-group">
          <label for="tipe_kamar">Tipe Kamar</label>
          <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" value="{{ $kamar->tipe_kamar }}" required>
        </div>
    
        <div class="form-group">
          <label for="harga">Harga</label>
          <input type="number" name="harga" id="harga" class="form-control" value="{{ $kamar->harga }}" required>
        </div>
    
        <div class="form-group">
          <label for="kapasitas">Kapasitas</label>
          <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ $kamar->kapasitas }}" required>
        </div>
    
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $kamar->deskripsi }}</textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
    </div>
    @endsection
    
    <div class="mb-3">
      <label for="harga" class="form-label">Harga per Malam (Rp)</label>
      <input type="number" step="0.01" class="form-control" id="harga" name="harga" min="0" value="{{ old('harga', $kamar->harga) }}" required>
    </div>

    <div class="mb-3">
      <label for="kapasitas" class="form-label">Kapasitas (Orang)</label>
      <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" value="{{ old('harga', $kamar->kapasitas) }}" required>
    </div>

    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi (optional)</label>
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kamar->deskripsi) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('kamars.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
