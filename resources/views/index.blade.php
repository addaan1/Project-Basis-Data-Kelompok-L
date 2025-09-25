@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Pengaturan Tampilan</h2>

    <div class="glass-morphism">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <form action="{{ route('settings.updateBackground') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="background_url" class="form-label">Pilih Gambar Latar</label>
                <select name="background_url" id="background_url" class="form-select">
                    @foreach($backgrounds as $name => $url)
                        <option value="{{ $url }}" {{ session('background_url') == $url ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection