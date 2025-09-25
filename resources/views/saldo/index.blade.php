@extends('layouts.main')

@section('content')
<h2>Daftar Saldo</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('saldo.create') }}" class="btn btn-primary mb-3">Tambah Saldo</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Saldo</th>
            <th>Keterangan</th>
            <th>Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($saldos as $saldo)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $saldo->user->nama ?? '-' }}</td>
                <td>Rp {{ number_format($saldo->saldo, 0, ',', '.') }}</td>
                <td>{{ $saldo->keterangan }}</td>
                <td>{{ $saldo->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('saldo.edit', $saldo->id_saldo) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('saldo.destroy', $saldo->id_saldo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">Belum ada data saldo</td></tr>
        @endforelse
    </tbody>
</table>
@endsection