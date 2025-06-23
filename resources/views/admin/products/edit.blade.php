@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Produk</h1>
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="buffet" {{ $product->category == 'buffet' ? 'selected' : '' }}>Sideboard</option>
                <option value="lemari" {{ $product->category == 'lemari' ? 'selected' : '' }}>Wardrobe</option>
                <option value="rak" {{ $product->category == 'rak' ? 'selected' : '' }}>Bookshelf</option>
                <option value="nakas" {{ $product->category == 'nakas' ? 'selected' : '' }}>Nightstand</option>
                <option value="kursi" {{ $product->category == 'kursi' ? 'selected' : '' }}>Chair & Shofa</option>
                <option value="meja" {{ $product->category == 'meja' ? 'selected' : '' }}>Desk & Table</option>
                <option value="living-room" {{ $product->category == 'living-room' ? 'selected' : '' }}>Living Room</option>
            </select>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ $product->featured ? 'checked' : '' }}>
            <label class="form-check-label" for="featured">Produk Pilihan</label>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="promo" id="promo" value="1" {{ $product->promo ? 'checked' : '' }}>
            <label class="form-check-label" for="promo">Promo</label>
        </div>
        <div class="mb-3">
            <label for="promo_price" class="form-label">Harga Promo</label>
            <input type="number" class="form-control" id="promo_price" name="promo_price" value="{{ $product->promo_price }}" {{ $product->promo ? '' : 'disabled' }}>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            @if($product->image)
                <div class="mb-2">
                    <img src="{{ asset('images/products/' . $product->image) }}" width="120"/>
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const promoCheckbox = document.getElementById('promo');
        const promoPriceInput = document.getElementById('promo_price');
        promoCheckbox.addEventListener('change', function() {
            promoPriceInput.disabled = !this.checked;
        });
    });
</script>
@endsection 