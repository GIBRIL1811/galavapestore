@if (count($products) != 0)
  @foreach ($products as $product)
      <div class="section-header mt-3">
        <div class="mb-3">
          <a href="{{ route('produk.show', [$product->slug]) }}" class="decoration-none">
            <div class="text-primary link-hover" style="font-size: 40px; letter-spacing: .5px; line-height: 1.3;">
              {{ $product->title }}
            </div>
          </a>
          <div class="mt-1">
            <small class="font-italic">Created At : {{ date('d M Y', strtotime($product->created_at)) }} |</small>
            @foreach($product->categories as $value)
                <a class="d-inline underline" href="{{ route('produk', ['c' => $value->name]) }}">
                    <small class="font-italic">
                      {{ $value->name }},
                    </small>
                </a>
            @endforeach
          </div>
        </div>

          @php
              // delete tag image;
              $content = preg_replace('/<img .*. \/>|<p.*?.>|<\/p>/', '', $product->konten);
          @endphp
        <p> 
          &emsp;&emsp;&emsp; {!! Str::limit($content, 725, ' . . .') !!}
        </p>
          <a href="{{ route('produk.show', [$product->slug]) }}" class="ml-3"> <span class="text-primary">Read More <i class="fa fa-long-arrow-right"></i> </span></a>
        <hr class="mt-3">
      </div>
  @endforeach
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
