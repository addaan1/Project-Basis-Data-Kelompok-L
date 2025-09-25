@extends('layouts.main')

@section('content')
<h2>Daftar Inventaris</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('inventaris.create') }}" class="btn btn-primary mb-3">Tambah Inventaris</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Jumlah</th>
            <th>Tgl Masuk</th>
            <th>Tgl Keluar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inventaris as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->nama ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->tanggal_keluar ?? '-' }}</td>
                <td>
                    <a href="{{ route('inventaris.edit', $item->id_inventory) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('inventaris.destroy', $item->id_inventory) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
        @endforelse
    </tbody>
</table>
@endsection