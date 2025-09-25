@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Edit Data Petani</h2>

    <div class="glass-morphism" style="max-width: 800px;">
        <form action="{{ route('petani.update', $petani->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Petani</label>
                <input type="text" name="nama" class="form-control" value="{{ $petani->nama }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $petani->lokasi }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control" value="{{ $petani->kontak }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas Panen (Kg)</label>
                <input type="number" name="kapasitas_panen" class="form-control" value="{{ $petani->kapasitas_panen }}">
            </div>
             <div class="mb-3">
                <label class="form-label">ID User</label>
                <input type="number" name="id_user" class="form-control" value="{{ $petani->id_user }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="{{ route('petani.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection