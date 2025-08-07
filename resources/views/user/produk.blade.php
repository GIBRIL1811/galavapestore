@extends('layouts.user')

@section('header')
    <style>
        #hero {
            background: url('{{ asset('user/images/Tugu-Jogja.png') }}') top center;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
        }
    </style>
@endsection

@section('hero')
    <h1>Gala Vapestore</h1>
    <h2>Koleksi Produk Terbaik dari Toko Kami</h2>
@endsection

@section('content')
    {{-- Search Bar --}}
    <div class="container search-bar-wrapper">
        <form action="{{ route('produk') }}">
            <div class="search-bar d-flex align-items-center">
                <input type="text" name="s" value="{{ Request::get('s') }}" placeholder="Cari produk...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>

    {{-- Section Produk --}}
    <section id="products">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-12">
                    @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        @component('user.component.all_products', ['products' => $products])
                        @endcomponent
                    @else
                        @component('user.component.single_products', ['product' => $products])
                        @endcomponent
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
