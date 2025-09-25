@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Tambah Data Distributor Baru</h2>

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

        <form action="{{ route('distributor.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Wilayah Distribusi</label>
                <input type="text" name="wilayah_distribusi" class="form-control" placeholder="Masukkan Wilayah">
            </div>
             <div class="mb-3">
                <label class="form-label">ID User</label>
                <input type="number" name="id_user" class="form-control" placeholder="Masukkan ID User (contoh: 1)">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-secondary" href="{{ route('distributor.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection