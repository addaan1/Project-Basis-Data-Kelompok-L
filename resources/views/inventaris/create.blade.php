@extends('layouts.main')

@section('content')
<h2>Tambah Inventaris</h2>

@include('partials.errors')

<form action="{{ route('inventaris.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>User</label>
        <select name="id_user" class="form-control">
            @foreach ($users as $u)
                <option value="{{ $u->id_user }}" {{ old('id_user')==$u->id_user?'selected':'' }}>
                    {{ $u->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" min="1" required>
    </div>
    <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk') }}" required>
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('inventaris.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection