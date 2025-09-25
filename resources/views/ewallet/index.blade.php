@extends('layouts.main')

@section('content')
<h2>Daftar E-Wallet</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('ewallet.create') }}" class="btn btn-primary mb-3">Tambah E-Wallet</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Saldo</th>
            <th>Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ewallets as $w)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $w->user->nama ?? '-' }}</td>
                <td>Rp {{ number_format($w->saldo,0,',','.') }}</td>
                <td>{{ $w->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('ewallet.edit', $w->id_wallet) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('ewallet.destroy', $w->id_wallet) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
        @endforelse
    </tbody>
</table>
@endsection