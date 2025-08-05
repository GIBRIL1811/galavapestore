@extends('layouts.user')

@section('header')
    <style>
        #hero {
            background: url('{{ asset('user/images/Tugu-Jogja.png') }}') top center;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }

        .product-description {
            line-height: 1.6;
            font-size: 15px;
        }
    </style>
@endsection

@section('hero')
    <h1>Gala Vapestore</h1>
    <h2>Koleksi Produk Terbaik dari Toko Kami</h2>
@endsection

@section('content')
    <section id="products">
        <div class="container wow fadeIn">
            <div class="row">
                {{-- Konten utama --}}
                <div class="{{ $products instanceof \Illuminate\Pagination\LengthAwarePaginator ? 'col-md-9' : 'col-md-12' }}">
                    @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{-- List produk --}}
                        @component('user.component.all_products', ['products' => $products])
                        @endcomponent
                    @else
                        {{-- Detail produk --}}
                        @component('user.component.single_products', ['product' => $products])
                        @endcomponent
                    @endif
                </div>

                {{-- Sidebar hanya untuk list produk --}}
                @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="col-md-3">
                        <form action="{{ route('produk') }}" class="mt-5">
                            <div class="input-group mb-4 border rounded-pill shadow-lg">
                                <input type="text" name="s" value="{{ Request::get('s') }}" placeholder="Cari produk..." class="form-control bg-none border-0">
                                <div class="input-group-append border-0">
                                    <button type="submit" class="btn text-success">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="mb-3 font-weight-bold">Produk Terbaru</div>
                        @foreach ($recents as $recent)
                            <div>
                                <a href="{{ route('produk.show', $recent->slug) }}">
                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $recent->title }}
                                </a>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
