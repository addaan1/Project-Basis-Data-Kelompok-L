@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Manajemen Data Distributor</h2>

    <div class="glass-morphism">
        <a href="{{ route('distributor.create') }}" class="btn btn-success mb-3">Tambah Distributor Baru</a>

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
                    <th>Wilayah Distribusi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($distributor as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->wilayah_distribusi }}</td>
                    <td>
                        <form action="{{ route('distributor.destroy', $d->id) }}" method="POST">
                            <a href="{{ route('distributor.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
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