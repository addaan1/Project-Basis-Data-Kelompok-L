@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Edit Data Inventory</h2>

    <div class="glass-morphism" style="max-width: 800px;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inventory.update', $inventory->id_inventory) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Jumlah (Kg)</label>
                <input type="number" name="jumlah" class="form-control" value="{{ $inventory->jumlah }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" value="{{ $inventory->tanggal_masuk }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" value="{{ $inventory->tanggal_keluar }}">
            </div>
             <div class="mb-3">
                <label class="form-label">Penanggung Jawab (User)</label>
                <select name="id_user" class="form-select">
                    @foreach($users as $user)
                        <option value="{{ $user->id_user }}" {{ $inventory->id_user == $user->id_user ? 'selected' : '' }}>
                            {{ $user->nama }} (Peran: {{ $user->peran }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="{{ route('inventory.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection