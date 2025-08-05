@if ($product != null)
@php
    // Tambahkan class navbar agar tidak transparan
    $addHeaderScrolled = true;
@endphp

{{-- Tambahkan CSS agar navbar jadi solid background hanya di halaman ini --}}
<style>
    /* Navbar tidak transparan */
    .navbar {
        background-color: #343a40 !important;
        transition: background-color 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar a {
        color: #000 !important; /* Pastikan teks navbar tetap terlihat */
    }
</style>

<div class="container pt-5 mt-5">
    <div class="row align-items-start">
        {{-- Gambar Produk --}}
        <div class="col-md-6 text-center">
            @if($product->gambar)
                <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid mb-4" alt="{{ $product->title }}" style="max-height: 500px;">
            @endif
        </div>

        {{-- Informasi Produk --}}
        <div class="col-md-6">
            {{-- Breadcrumb --}}
            <div class="mb-2">
                <a href="{{ route('home') }}">Home</a> /
                @foreach($product->categories as $value)
                    <a href="{{ route('produk', ['c' => $value->name]) }}">{{ $value->name }}</a> /
                @endforeach
                <span>{{ $product->title }}</span>
            </div>

            <h2 class="font-weight-bold">{{ $product->title }}</h2>
            <h4 class="text-dark mb-3">Rp{{ number_format($product->harga, 0, ',', '.') }}</h4>

            {{-- Stok Tersedia --}}
            <div class="mb-3">
                <strong>Stok tersedia:</strong> {{ $product->kuantitas ?? '0' }} pcs
            </div>

            {{-- Deskripsi Produk --}}
            <div class="mt-4 product-description text-muted">
                <strong>Deskripsi:</strong>
                <div class="mt-2">{!! $product->konten !!}</div>
            </div>
        </div>
    </div>
</div>

@else
<style>
    .page {
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 100;
        height: 100vh;
    }
</style>
<div class="full-height bg-white mt-5 d-flex align-items-center justify-content-center" style="height: 10vh;">
    <div class="code font-weight-bold text-center" style="border-right: 3px solid; font-size: 60px; padding: 0 15px 0 15px;">
        404
    </div>
    <div class="text-center" style="padding: 10px; font-size: 46px;">
        Produk Tidak Ditemukan
    </div>
</div>
@endif
