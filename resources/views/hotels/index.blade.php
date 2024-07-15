@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Hotel</h1>

    <a href="{{ route('hotels.create') }}" class="btn btn-primary">Tambah Hotel Baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Hotel</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Bintang</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
            <tr>
                <td>{{ $hotel->nama_hotel }}</td>
                <td>{{ $hotel->alamat }}</td>
                <td>{{ $hotel->kota }}</td>
                <td>{{ $hotel->bintang }}</td>
                <td>{{ $hotel->deskripsi }}</td>
                <td>
                    <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus hotel ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection