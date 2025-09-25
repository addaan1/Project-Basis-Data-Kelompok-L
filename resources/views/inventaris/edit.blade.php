@extends('layouts.main')

@section('content')
<h2>Edit Inventaris</h2>

@include('partials.errors')

<form action="{{ route('inventaris.update', $inventaris->id_inventory) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>User</label>
        <select name="id_user" class="form-control">
            @foreach ($users as $u)
                <option value="{{ $u->id_user }}" {{ $inventaris->id_user==$u->id_user?'selected':'' }}>
                    {{ $u->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah',$inventaris->jumlah) }}" min="1" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk',$inventaris->tanggal_masuk) }}" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar" class="form-control" value="{{ old('tanggal_keluar',$inventaris->tanggal_keluar) }}">
    </div>
    <button class="btn btn-primary">Perbarui</button>
    <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection