@extends('layouts.main')

@section('content')
<h2>Edit Negosiasi</h2>

@include('partials.errors')

<form action="{{ route('negosiasi.update', $negosiasi->id_negosiasi) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Transaksi</label>
        <select name="id_transaksi" class="form-control">
            @foreach ($transaksis as $tr)
                <option value="{{ $tr->id_transaksi }}" {{ $negosiasi->id_transaksi==$tr->id_transaksi?'selected':'' }}>
                    #{{ $tr->id_transaksi }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Penawar</label>
        <select name="id_user_penawar" class="form-control">
            @foreach ($users as $u)
                <option value="{{ $u->id_user }}" {{ $negosiasi->id_user_penawar==$u->id_user?'selected':'' }}>
                    {{ $u->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Harga Tawaran</label>
        <input type="number" name="harga_tawaran" min="0" step="0.01" class="form-control"
               value="{{ old('harga_tawaran', $negosiasi->harga_tawaran) }}" required>
    </div>
    <div class="mb-3">
        <label>Catatan</label>
        <textarea name="catatan" class="form-control">{{ old('catatan', $negosiasi->catatan) }}</textarea>
    </div>
    <button class="btn btn-primary">Perbarui</button>
    <a href="{{ route('negosiasi.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection