@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kamar</h2>

    <a href="{{ route('kamars.create') }}" class="btn btn-primary">Tambah Kamar Baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Hotel</th>
                <th>Nomor Kamar</th>
                <th>Tipe Kamar</th>
                <th>Harga</th>
                <th>Kapasitas</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kamars as $kamar)
            <tr>
                <td>{{ $kamar->hotel->nama_hotel ?? 'Tidak diketahui' }}</td>
                <td>{{ $kamar->nomor_kamar }}</td>
                <td>{{ $kamar->tipe_kamar }}</td>
                <td>Rp {{ number_format($kamar->harga, 2, ',', '.') }}</td>
                <td>{{ $kamar->kapasitas }} orang</td>
                <td>{{ $kamar->deskripsi }}</td>
                <td>
                    {{-- <a href="{{ route('kamars.show', $kamar->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                    <a href="{{ route('kamars.edit', $kamar->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('kamars.destroy', $kamar->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus kamar ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection