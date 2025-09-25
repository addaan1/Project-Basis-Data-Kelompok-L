@extends('layouts.main')

@section('content')
    <h2>Manajemen Data Petani</h2>
    <a href="{{ url('/app/petani/create') }}" class="btn-primary">Tambah Petani Baru</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Kontak</th>
                <th>Kapasitas Panen (Kg)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petani as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->lokasi }}</td>
                    <td>{{ $p->kontak }}</td>
                    <td>{{ $p->kapasitas }}</td>
                    <td>
                        <a href="{{ url('/app/petani/'.$p->id.'/edit') }}" class="btn-warning">Edit</a>
                        <form action="{{ url('/app/petani/'.$p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
