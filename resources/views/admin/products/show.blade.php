@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Detail Produk</h1>
    <div class="card" style="max-width: 500px;">
        @if($product->image)
            <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Harga: <b>Rp {{ number_format($product->price, 0, ',', '.') }}</b></p>
            <p class="card-text">Stok: {{ $product->stock }}</p>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection 