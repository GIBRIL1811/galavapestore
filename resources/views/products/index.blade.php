@extends('layouts.admin')

@section('title', 'Products')

@section('breadcrumbs', 'Overview Products')

@section('css')
    <style>
        .underline:hover {
            text-decoration: underline;
        }

        .product-image {
            width: 100px;
            height: auto;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                {{-- button create --}}
                <div class="mb-5 text-right">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-plus"></i> Tambah Produk
                    </a>
                </div>

                {{-- display filter --}}
                <div class="row mb-3">
                    <div class="col-sm-7">
                        <ul class="nav nav-tabs ">
                            <li class="nav-item">
                                <a class="nav-link p-2 px-3 {{ Request::get('status') == NULL ? 'active' : '' }}" href="{{ route('products.index') }}">Semua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 px-3 {{ Request::get('status') == 'publish' ? 'active' : '' }}" href="{{ route('products.index', ['status' => 'publish']) }}">Publish</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 px-3 {{ Request::get('status') == 'draft' ? 'active' : '' }}" href="{{ route('products.index', ['status' => 'draft']) }}">Draft</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{ route('products.index') }}">
                            <div class="input-group">
                                <input name="keyword" type="text" value="{{ Request::get('keyword') }}" class="form-control" placeholder="Cari nama produk">
                                <div class="input-group-append">
                                    <input type="submit" value="Cari" class="btn btn-info">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif

                {{-- table --}}
                <table class="table">
                    <thead class="text-light" style="background-color:#33b751 !important">
                        <tr>
                            <th>No</th>
                            <th class="text-center">Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Kuantitas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($product->gambar)
                                        <img src="{{ asset('storage/' . $product->gambar) }}" class="product-image" alt="{{ $product->title }}">
                                    @else
                                        <small class="text-muted">Tidak ada gambar</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="underline text-dark">
                                        <strong>{{ $product->title }}</strong>
                                    </a>
                                </td>
                                <td>
                                    @foreach($product->categories as $category)
                                        <a class="d-inline underline" href="{{ route('products.index', ['c' => $category->name]) }}">
                                            <span class="text-muted font-italic" style="font-size: 12px">{{ $category->name }}</span>@if (!$loop->last), @endif
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    Rp{{ number_format($product->harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    {{ $product->kuantitas }}
                                </td>
                                <td>
                                    @if ($product->status == 'DRAFT')
                                        <span class="font-italic text-danger">Draft</span>
                                    @else
                                        <span class="font-italic text-success">Publish</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning text-light" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <form class="d-inline" method="POST" action="{{ route('products.destroy', $product->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada produk ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                {{ $products->appends(Request::all())->links() }}
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
