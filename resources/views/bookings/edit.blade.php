@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $booking->user_id }}" required>
        </div>
        <div class="form-group">
            <label for="kamar_id">Kamar ID:</label>
            <input type="number" name="kamar_id" id="kamar_id" class="form-control" value="{{ $booking->kamar_id }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_check_in">Tanggal Check-In:</label>
            <input type="date" name="tanggal_check_in" id="tanggal_check_in" class="form-control" value="{{ $booking->tanggal_check_in }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_check_out">Tanggal Check-Out:</label>
            <input type="date" name="tanggal_check_out" id="tanggal_check_out" class="form-control" value="{{ $booking->tanggal_check_out }}" required>
        </div>
        <div class="form-group">
            <label for="total_harga">Total Harga:</label>
            <input type="number" name="total_harga" id="total_harga" class="form-control" value="{{ $booking->total_harga }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Booking</button>
    </form>
</div>
@endsection