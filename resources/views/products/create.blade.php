@extends('layouts.admin')

@section('title', 'Tambah Produk')
@section('breadcrumbs', 'Tambah Produk')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">

                    {{-- Judul --}}
                    <div class="form-group">
                        <label for="title">Nama Produk</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror">
                        @error('gambar')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="form-group">
                        <label for="categories">Kategori</label>
                        <select name="categories[]" id="categories" multiple class="form-control @error('categories') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Bisa memilih lebih dari satu kategori.</small>
                        @error('categories')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="content">Deskripsi Produk</label>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="6">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="form-group">
                        <label for="harga">Harga Produk (Rp)</label>
                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kuantitas --}}
                    <div class="form-group">
                        <label for="kuantitas">Kuantitas Produk</label>
                        <input type="number" name="kuantitas" id="kuantitas" class="form-control @error('kuantitas') is-invalid @enderror" value="{{ old('kuantitas') }}" required>
                        @error('kuantitas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="form-group text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Produk</button>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                            <option value="PUBLISH" {{ old('status') == 'PUBLISH' ? 'selected' : '' }}>Publish</option>
                            <option value="DRAFT" {{ old('status') == 'DRAFT' ? 'selected' : '' }}>Draft</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
            </div>
        </form>
    </div>
</div>
@endsection
