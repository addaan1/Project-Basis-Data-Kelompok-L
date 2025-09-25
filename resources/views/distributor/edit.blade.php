@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Edit Data Distributor</h2>

    <div class="glass-morphism" style="max-width: 800px;">
        <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input type="text" name="nama" class="form-control" value="{{ $distributor->nama }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Wilayah Distribusi</label>
                <input type="text" name="wilayah_distribusi" class="form-control" value="{{ $distributor->wilayah_distribusi }}">
            </div>
             <div class="mb-3">
                <label class="form-label">ID User</label>
                <input type="number" name="id_user" class="form-control" value="{{ $distributor->id_user }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-secondary" href="{{ route('distributor.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection