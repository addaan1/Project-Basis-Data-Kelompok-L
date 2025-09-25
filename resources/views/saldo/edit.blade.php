@extends('layouts.main')

@section('content')
<h2>Edit Saldo</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('saldo.update', $saldo->id_saldo) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="id_user" class="form-label">User</label>
        <select name="id_user" id="id_user" class="form-control">
            @foreach ($users as $user)
                <option value="{{ $user->id_user }}" {{ $saldo->id_user == $user->id_user ? 'selected' : '' }}>
                    {{ $user->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="saldo" class="form-label">Saldo (Rp)</label>
        <input type="number" name="saldo" id="saldo" class="form-control" value="{{ old('saldo', $saldo->saldo) }}" min="0" step="0.01" required>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $saldo->keterangan) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('saldo.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection