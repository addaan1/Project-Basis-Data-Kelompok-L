@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Edit Data Pengepul</h2>

    <div class="glass-morphism" style="max-width: 800px;">
        <form action="{{ route('pengepul.update', $pengepul->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Pengepul</label>
                <input type="text" name="nama" class="form-control" value="{{ $pengepul->nama }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $pengepul->lokasi }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas Tampung (Kg)</label>
                <input type="number" name="kapasitas_tampung" class="form-control" value="{{ $pengepul->kapasitas_tampung }}">
            </div>
             <div class="mb-3">
                <label class="form-label">ID User</label>
                <input type="number" name="id_user" class="form-control" value="{{ $pengepul->id_user }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="{{ route('pengepul.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection