@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Manajemen Data Pengepul</h2>

    <div class="glass-morphism">
        <a href="{{ route('pengepul.create') }}" class="btn btn-success mb-3">Tambah Pengepul Baru</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-hover text-white">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Kapasitas Tampung (Kg)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengepul as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->lokasi }}</td>
                    <td>{{ $p->kapasitas_tampung }}</td>
                    <td>
                        <form action="{{ route('pengepul.destroy', $p->id) }}" method="POST">
                            <a href="{{ route('pengepul.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection