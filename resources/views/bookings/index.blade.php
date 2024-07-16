@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Booking</h1>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Tambah Booking Baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Kamar</th>
                <th>Tanggal Check-In</th>
                <th>Tanggal Check-Out</th>
                <th>Total Harga (Rp)</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->user->nama ?? 'Tidak diketahui' }}</td>
                <td>{{ $booking->kamar->tipe_kamar }}</td>
                <td>{{ $booking->tanggal_check_in->format('d F Y') }}</td>
                <td>{{ $booking->tanggal_check_out->format('d F Y') }}</td>
                <td>{{ number_format($booking->total_harga, 2, ',', '.') }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @can('update bookings') <a href="{{ route('bookings.edit', $booking->id) }}"
                        class="btn btn-primary btn-sm">Edit</a>
                    @endcan
                    @can('delete bookings') <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus booking ini?')">Hapus</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection