@if ($product != null)
  <div class="section-header mt-3">
    <div class="mb-3">
      <div class="text-dark" style="font-size: 40px; letter-spacing: .5px; line-height: 1.3;">
        {{ $product->title }}
      </div>
      <div class="mt-1">
        <small class="font-italic">Dibuat pada: {{ date('d M Y', strtotime($product->created_at)) }} |</small>
        @foreach($product->categories as $value)
            <a class="d-inline underline" href="{{ route('produk', ['c' => $value->name]) }}">
                <small class="font-italic text-primary">
                    {{ $value->name }}
                </small>
            </a>
        @endforeach
      </div>
    </div>

    @if($product->gambar)
      <div class="mb-4 text-center">
        <img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded" alt="{{ $product->title }}" style="max-height: 400px;">
      </div>
    @endif

    <p class="mb-3 product-description text-justify"> 
      {!! $product->konten !!}
    </p>
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
