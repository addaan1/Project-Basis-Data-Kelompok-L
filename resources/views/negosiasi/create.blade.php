@extends('layouts.main')

@section('content')
<h2>Tambah Negosiasi</h2>

@include('partials.errors')

<form action="{{ route('negosiasi.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Transaksi</label>
        <select name="id_transaksi" class="form-control">
            @foreach ($transaksis as $tr)
                <option value="{{ $tr->id_transaksi }}" {{ old('id_transaksi')==$tr->id_transaksi?'selected':'' }}>
                    #{{ $tr->id_transaksi }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Penawar</label>
        <select name="id_user_penawar" class="form-control">
            @foreach ($users as $u)
                <option value="{{ $u->id_user }}" {{ old('id_user_penawar')==$u->id_user?'selected':'' }}>
                    {{ $u->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Harga Tawaran</label>
        <input type="number" name="harga_tawaran" min="0" step="0.01" class="form-control" value="{{ old('harga_tawaran') }}" required>
    </div>
    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control">{{ old('catatan') }}</textarea>
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('negosiasi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection