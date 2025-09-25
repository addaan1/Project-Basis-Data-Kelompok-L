@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Manajemen Inventory</h2>

    <div class="glass-morphism">
        <a href="{{ route('inventory.create') }}" class="btn btn-success mb-3">Tambah Stok Masuk</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-hover text-white">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Penanggung Jawab (User)</th>
                    <th>Jumlah (Kg)</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventory as $inv)
                <tr>
                    <td>{{ $inv->id_inventory }}</td>
                    <td>{{ $inv->user->nama ?? 'User tidak ditemukan' }}</td>
                    <td>{{ number_format($inv->jumlah) }}</td>
                    <td>{{ $inv->tanggal_masuk }}</td>
                    <td>{{ $inv->tanggal_keluar ?? '-' }}</td>
                    <td>
                        <form action="{{ route('inventory.destroy', $inv->id_inventory) }}" method="POST">
                            <a href="{{ route('inventory.edit', $inv->id_inventory) }}" class="btn btn-warning btn-sm">Edit</a>
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