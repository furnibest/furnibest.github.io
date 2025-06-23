@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tambah Produk</h1>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="buffet">Sideboard</option>
                <option value="lemari">Wardrobe</option>
                <option value="rak">Bookshelf</option>
                <option value="nakas">Nightstand</option>
                <option value="kursi">Chair & Shofa</option>
                <option value="meja">Desk & Table</option>
                <option value="living-room">Living Room</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1">
            <label class="form-check-label" for="featured">Produk Pilihan</label>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="promo" id="promo" value="1">
            <label class="form-check-label" for="promo">Promo</label>
        </div>
        <div class="mb-3">
            <label for="promo_price" class="form-label">Harga Promo</label>
            <input type="number" class="form-control" id="promo_price" name="promo_price">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection 