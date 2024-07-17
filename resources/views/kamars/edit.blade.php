@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Kamar</h2>
      <form action="{{ route('kamars.update', $kamar) }}" method="POST" class="container">
      @csrf
      @method('PUT')
    
        <div class="form-group">
          <label for="hotel_id">Nama Hotel</label>
          <select name="hotel_id" id="hotel_id" class="form-control" readonly>
            @foreach($hotels as $hotel)
              <option value="{{ $hotel->id }}" {{ $kamar->hotel_id == $hotel->id ? 'selected' : '' }}>{{ $hotel->nama_hotel }}</option>
            @endforeach
          </select>
        </div>
    
        <div class="form-group">
          <label for="nomor_kamar">Nomor Kamar</label>
          <input type="text" name="nomor_kamar" id="nomor_kamar" class="form-control" value="{{ $kamar->nomor_kamar }}" required>
        </div>
    
        <div class="form-group">
          <label for="tipe_kamar">Tipe Kamar</label>
          <input type="text" name="tipe_kamar" id="tipe_kamar" class="form-control" value="{{ $kamar->tipe_kamar }}" required>
        </div>
    
        <div class="mb-3">
          <label for="harga" class="form-label">Harga per Malam (Rp)</label>
          <input type="number" step="0.01" class="form-control" id="harga" name="harga" min="0" value="{{ old('harga', $kamar->harga) }}" required>
        </div>
        
        <div class="mb-3">
          <label for="kapasitas" class="form-label">Kapasitas (Orang)</label>
          <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="1" value="{{ old('harga', $kamar->kapasitas) }}" required>
        </div>
        
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $kamar->deskripsi }}</textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const tanggalCheckIn = document.getElementById('tanggal_check_in');
          const tanggalCheckOut = document.getElementById('tanggal_check_out');
          const kamarSelect = document.getElementById('kamar_id');
          const totalHargaInput = document.getElementById('total_harga');
  
          function calculateTotalHarga() {
              const checkInDate = new Date(tanggalCheckIn.value);
              const checkOutDate = new Date(tanggalCheckOut.value);
              const hargaPerHari = kamarSelect.options[kamarSelect.selectedIndex].getAttribute('data-harga');
  
              if (checkInDate && checkOutDate && hargaPerHari) {
                  const timeDiff = Math.abs(checkOutDate - checkInDate);
                  const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
                  const totalHarga = daysDiff * hargaPerHari;
                  totalHargaInput.value = totalHarga;
              }
          }
  
          tanggalCheckIn.addEventListener('change', calculateTotalHarga);
          tanggalCheckOut.addEventListener('change', calculateTotalHarga);
          kamarSelect.addEventListener('change', calculateTotalHarga);
      });
  </script>
  
    @endsection