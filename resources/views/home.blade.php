@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>
    .tokopedia-hero {
        background: linear-gradient(90deg, #6c757d 60%, #fff 100%);
        color: #fff;
        padding: 48px 0 32px 0;
        min-height: 320px;
        display: flex;
        align-items: center;
        background-image: url('{{ asset('images/hero.webp') }}');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .tokopedia-hero .hero-content {
        position: relative;
        z-index: 2;
    }
    .tokopedia-hero::after {
        content: '';
        position: absolute;
        left: 0; top: 0; right: 0; bottom: 0;
        background: rgba(108,117,125,0.55);
        z-index: 1;
    }
    .tokopedia-category {
        display: flex;
        gap: 18px;
        justify-content: center;
        margin: 32px 0 24px 0;
        flex-wrap: wrap;
    }
    .tokopedia-category .cat-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04);
        padding: 18px 28px;
        text-align: center;
        color: #222;
        font-weight: 600;
        font-size: 1.1rem;
        border: 1.5px solid #e0e0e0;
        transition: box-shadow .2s, border .2s;
        cursor: pointer;
    }
    .tokopedia-category .cat-card:hover {
        box-shadow: 0 4px 16px 0 rgba(108,117,125,0.12);
        border: 1.5px solid #6c757d;
        color: #222;
    }
    .tokopedia-product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 28px;
        margin-bottom: 48px;
    }
    .tokopedia-product-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04);
        overflow: hidden;
        transition: box-shadow .2s;
        border: 1.5px solid #e0e0e0;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .tokopedia-product-card:hover {
        box-shadow: 0 6px 24px 0 rgba(108,117,125,0.12);
        border: 1.5px solid #6c757d;
    }
    .tokopedia-product-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        background: #f6f6f6;
    }
    .tokopedia-product-card .card-body {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .tokopedia-product-card .btn {
        background: #6c757d;
        color: #fff;
        border-radius: 12px;
        font-weight: 600;
        margin-top: 8px;
    }
    .tokopedia-product-card .btn:hover {
        background: #444;
    }
    .tokopedia-promo {
        background: linear-gradient(90deg, #e0e0e0 60%, #fff 100%);
        border-radius: 16px;
        padding: 24px 32px;
        margin: 32px 0 40px 0;
        display: flex;
        align-items: center;
        gap: 24px;
        font-size: 1.2rem;
        color: #222;
        font-weight: 600;
    }
    @media (max-width: 768px) {
        .tokopedia-hero { padding: 32px 0 24px 0; min-height: 180px; }
        .tokopedia-category { gap: 10px; }
        .tokopedia-promo { flex-direction: column; padding: 18px 12px; }
    }
</style>
<div class="tokopedia-hero">
    <div class="container hero-content">
        <h1 class="display-5 fw-bold mb-2" style="color:#222;">Welcome to Cacam Furniture</h1>
        <p class="lead mb-4" style="color:#222;">Belanja furniture premium, mudah & terpercaya. Temukan produk impianmu di sini!</p>
        <a href="{{ route('products') }}" class="btn btn-light btn-lg" style="color:#6c757d; font-weight:700;">Lihat Semua Produk</a>
    </div>
</div>

<div class="container">
    <div class="tokopedia-category">
        <div class="cat-card" onclick="window.location='{{ route('products', ['category'=>'buffet']) }}'">Sideboard</div>
        <div class="cat-card" onclick="window.location='{{ route('products', ['category'=>'lemari']) }}'">Wardrobe</div>
        <div class="cat-card" onclick="window.location='{{ route('products', ['category'=>'rak']) }}'">Bookshelf</div>
        <div class="cat-card" onclick="window.location='{{ route('products', ['category'=>'nakas']) }}'">Nightstand</div>
        <div class="cat-card" onclick="window.location='{{ route('products', ['category'=>'kursi']) }}'">Chair & Sofa</div>
        <div class="cat-card" onclick="window.location='{{ route('products', ['category'=>'meja']) }}'">Desk & Table</div>
    </div>

    <div class="tokopedia-promo">
        <img src="{{ asset('images/about.png') }}" alt="Promo" style="height:60px; border-radius:12px;">
        Promo Spesial! Gratis ongkir untuk pembelian di atas Rp 1.000.000 dan diskon hingga 20% untuk produk pilihan.
    </div>

    <h2 class="fw-bold mb-4" style="color:#222;">Produk Pilihan</h2>
    <div class="tokopedia-product-grid">
        @foreach($products ?? [] as $product)
        <div class="tokopedia-product-card">
            <img src="{{ asset('images/products/' . $product['image']) }}" alt="{{ $product['name'] }}">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title mb-1">{{ $product['name'] }}</h5>
                <p class="card-text mb-2" style="font-size:0.98rem; color:#555;">{{ $product['description'] }}</p>
                <div class="fw-bold mb-2" style="color:#222; font-size:1.1rem;">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                <a href="{{ route('products') }}" class="btn">Lihat Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection 