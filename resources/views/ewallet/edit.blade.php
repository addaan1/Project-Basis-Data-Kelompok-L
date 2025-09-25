@extends('layouts.main')

@section('content')
<h2>Edit E-Wallet</h2>

@include('partials.errors')

<form action="{{ route('ewallet.update', $ewallet->id_wallet) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>User</label>
        <select name="id_user" class="form-control">
            @foreach ($users as $u)
                <option value="{{ $u->id_user }}" {{ $ewallet->id_user==$u->id_user?'selected':'' }}>
                    {{ $u->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Saldo (Rp)</label>
        <input type="number" name="saldo" min="0" step="0.01" class="form-control"
               value="{{ old('saldo', $ewallet->saldo) }}" required>
    </div>
    <button class="btn btn-primary">Perbarui</button>
    <a href="{{ route('ewallet.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection