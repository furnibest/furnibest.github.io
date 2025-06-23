@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero-section" style="background-image: linear-gradient(rgba(80,80,80,0.5), rgba(80,80,80,0.5)), url('{{ asset('images/hero.webp') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4" style="color:#222;">Welcome to Cacam Furniture</h1>
                <p class="lead" style="color:#222;">Discover our collection of premium furniture for your dream home</p>
                <a href="{{ route('products') }}" class="btn btn-light btn-lg" style="color:#6c757d; font-weight:700;">View Our Collection</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-4" style="color:#222;">Why Choose Us</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="fas fa-star fa-3x mb-3 text-warning"></i>
                    <h5 class="card-title">Quality Products</h5>
                    <p class="card-text">We offer high-quality furniture made from premium materials.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="fas fa-truck fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Fast Delivery</h5>
                    <p class="card-text">Quick and reliable delivery service to your doorstep.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="fas fa-headset fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Customer Support</h5>
                    <p class="card-text">Dedicated support team to assist you with any queries.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-4">Featured Products</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/products/buffet.png') }}" class="card-img-top" alt="Modern Sofa" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">TV Table Retro</h5>
                    <p class="card-text">Tv Table with Oak Wood </p>
                    <p class="text-primary fw-bold" style="color:#222 !important;">Rp 2.300,00</p>
                    <a href="{{ route('products') }}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/products/mk1.png') }}" class="card-img-top" alt="Dining Table" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Office Desk</h5>
                    <p class="card-text">Durable and stylish desk to support various office activities.</p>
                    <p class="text-primary fw-bold" style="color:#222 !important;">Rp 1.800,00</p>
                    <a href="{{ route('products') }}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/products/nakas1.png') }}" class="card-img-top" alt="Queen Size Bed" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Nightstand</h5>
                    <p class="card-text">Luxurious queen size bed with headboard</p>
                    <p class="text-primary fw-bold" style="color:#222 !important;">Rp 1.300,00</p>
                    <a href="{{ route('products') }}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 