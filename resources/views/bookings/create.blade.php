@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Booking Baru</h1>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>
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
            <label for="kamar_id">Kamar</label>
            <select name="kamar_id" id="kamar_id" class="form-control" required>
                <option value="">Pilih Kamar</option>
                @foreach($kamars as $kamar)
                    <option value="{{ $kamar->id }}" data-harga="{{ $kamar->harga }}">{{ $kamar->tipe_kamar }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_check_in">Tanggal Check-In</label>
            <input type="date" name="tanggal_check_in" id="tanggal_check_in" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_check_out">Tanggal Check-Out</label>
            <input type="date" name="tanggal_check_out" id="tanggal_check_out" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga (Rp)</label>
            <input type="number" name="total_harga" id="total_harga" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="confirmed">Confirmed</option>
                <option value="pending">Pending</option>
                <option value="canceled">Canceled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Tambah Booking</button>
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
