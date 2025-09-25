@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Edit Data Pasar</h2>

    <div class="glass-morphism" style="max-width: 800px;">
        <form action="{{ route('pasar.update', $pasar->id_pasar) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Pasar</label>
                <input type="text" name="nama_pasar" class="form-control" value="{{ $pasar->nama_pasar }}">
            </div>
             <div class="mb-3">
                <label class="form-label">ID User</label>
                <input type="number" name="id_user" class="form-control" value="{{ $pasar->id_user }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="{{ route('pasar.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection