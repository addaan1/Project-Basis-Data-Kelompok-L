@extends('layouts.main')

@section('content')
<h2>Daftar Negosiasi Harga</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('negosiasi.create') }}" class="btn btn-primary mb-3">Tambah Negosiasi</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Transaksi</th>
            <th>Penawar</th>
            <th>Harga Tawaran</th>
            <th>Catatan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($negosiasis as $negosiasi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>#{{ $negosiasi->id_transaksi }}</td>
                <td>{{ $negosiasi->user->nama ?? '-' }}</td>
                <td>Rp {{ number_format($negosiasi->harga_tawaran,0,',','.') }}</td>
                <td>{{ $negosiasi->catatan }}</td>
                <td>{{ $negosiasi->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('negosiasi.edit', $negosiasi->id_negosiasi) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('negosiasi.destroy', $negosiasi->id_negosiasi) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
        @endforelse
    </tbody>
</table>
@endsection