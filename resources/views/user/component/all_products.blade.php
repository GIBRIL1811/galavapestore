@if (count($products) != 0)
<section id="products" class="section-bg">
  <div class="container mt-5">
    <div class="section-header">
      <h3 class="section-title">Semua Produk</h3>
      <p class="section-description">Temukan berbagai pilihan produk terbaik dari kami.</p>
    </div>

    <div class="row">
      @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
          <div class="product-box">
            {{-- Gambar Produk --}}
            <div class="product-img">
              <a href="{{ route('produk.show', [$product->slug]) }}">
                <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('default-image.png') }}" alt="{{ $product->title }}">
              </a>
            </div>

            {{-- Info Produk --}}
            <div class="product-info">
              <h4 class="product-title">
                <a href="{{ route('produk.show', [$product->slug]) }}">
                  {{ $product->title }}
                </a>
              </h4>
              <p class="product-price text-success">
                Rp{{ number_format($product->harga, 0, ',', '.') }}
              </p>
              <p class="product-stock text-muted">Stok: {{ $product->kuantitas }}</p>

              <a href="{{ route('produk.show', [$product->slug]) }}" class="btn btn-sm btn-custom mt-2">Lihat Detail</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@else
<div class="full-height bg-white mt-5 d-flex align-items-center justify-content-center" style="height: 10vh;">
  <div class="code font-weight-bold text-center" style="border-right: 3px solid; font-size: 60px; padding: 0 15px;">
      404
  </div>
  <div class="text-center" style="padding: 10px; font-size: 46px;">
      Tidak ada produk
  </div>
</div>
@endif
