@if (count($products) != 0)
    <div class="row mt-4">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    {{-- Foto Produk --}}
                    @if ($product->gambar)
                        <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top img-square" alt="{{ $product->title }}">
                    @else
                        <img src="{{ asset('default-image.png') }}" class="card-img-top" alt="No image">
                    @endif

                    {{-- Konten Produk --}}
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('produk.show', [$product->slug]) }}" class="text-decoration-none text-dark">
                                {{ $product->title }}
                            </a>
                        </h5>

                        {{-- Harga --}}
                        <p class="card-text text-success">
                            Rp{{ number_format($product->harga, 0, ',', '.') }}
                        </p>

                        {{-- Stok --}}
                        <p class="card-text">
                            <small class="text-muted">Stok: {{ $product->kuantitas }}</small>
                        </p>

                        <a href="{{ route('produk.show', [$product->slug]) }}" class="btn btn-sm btn-outline-primary mt-2">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
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
            Not Found
        </div>
    </div>
@endif
