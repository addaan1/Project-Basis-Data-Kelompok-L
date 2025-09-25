@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Manajemen Data Pasar</h2>

    <div class="glass-morphism">
        <a href="{{ route('pasar.create') }}" class="btn btn-success mb-3">Tambah Pasar Baru</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-hover text-white">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pasar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasar as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_pasar }}</td>
                    <td>
                        <form action="{{ route('pasar.destroy', $p->id_pasar) }}" method="POST">
                            <a href="{{ route('pasar.edit', $p->id_pasar) }}" class="btn btn-warning btn-sm">Edit</a>
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