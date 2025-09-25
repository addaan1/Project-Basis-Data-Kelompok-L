@extends('layouts.main')

@section('content')
    <h2 class="mb-4 fw-bold" style="color: var(--accent-yellow);">Pasar</h2>

    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-md-6">
            <div class="glass-card">
                <div class="row">
                    <div class="col-4 d-flex flex-column align-items-center justify-content-center text-center">
                        <img src="{{ asset('images/transaksi.jpg') }}" alt="Product" class="img-fluid rounded mb-2" style="max-width: 80px;">
                        <h6 class="fw-bold mb-0" style="color: var(--dark-text);">{{ $product->seller }}</h6>
                    </div>
                    <div class="col-8">
                        <div style="background-color: #4a6a8a; color: white; border-radius: 12px; padding: 15px;">
                            <p class="mb-1 fw-bold">Product: {{ $product->name }}</p>
                            <p class="mb-1">Bobot: {{ $product->weight }}KG</p>
                            <p class="mb-2">Lokasi: {{ $product->location }}</p>
                            <h5 class="fw-bolder">Harga: Rp{{ number_format($product->price, 0, ',', '.') }}/Kg</h5>
                        </div>
                        <button class="btn btn-brand-yellow w-100 mt-2">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Navigasi Halaman --}}
    <nav class="d-flex justify-content-center mt-4">
        <ul class="pagination">
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
@endsection