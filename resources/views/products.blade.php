@extends('layouts.app')

@section('title', 'Our Products')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Our Products</h1>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <div class="list-group">
                        <a href="{{ route('products', ['category' => 'all']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'all' ? 'active' : '' }}">
                            All Products
                        </a>
                        <a href="{{ route('products', ['category' => 'buffet']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'buffet' ? 'active' : '' }}">
                            Sideboard
                        </a>
                        <a href="{{ route('products', ['category' => 'lemari']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'lemari' ? 'active' : '' }}">
                            Wardrobe
                        </a>
                        <a href="{{ route('products', ['category' => 'rak']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'rak' ? 'active' : '' }}">
                            bookshelf
                        </a>
                        <a href="{{ route('products', ['category' => 'nakas']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'nakas' ? 'active' : '' }}">
                            Nightstand
                        </a>
                        <a href="{{ route('products', ['category' => 'kursi']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'kursi' ? 'active' : '' }}">
                            Chair & Shofa
                        </a>
                        <a href="{{ route('products', ['category' => 'meja']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'meja' ? 'active' : '' }}">
                            Desk & Table
                        </a>
                        <a href="{{ route('products', ['category' => 'featured']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'featured' ? 'active' : '' }}">
                            Produk Pilihan
                        </a>
                        <a href="{{ route('products', ['category' => 'promo']) }}" 
                           class="list-group-item list-group-item-action {{ $category === 'promo' ? 'active' : '' }}">
                            Promo
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                @if(count($products) > 0)
                    @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                                <img src="{{ asset('images/products/' . $product->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $product->name }}" 
                                     style="height: 200px; object-fit: cover; cursor: pointer;">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $product->name }}
                                    @if($product->featured)
                                        <span class="badge bg-success ms-1">Pilihan</span>
                                    @endif
                                    @if($product->promo)
                                        <span class="badge bg-danger ms-1">Promo</span>
                                    @endif
                                </h5>
                                <p class="card-text">{{ $product->description }}</p>
                                @if($product->promo)
                                    <span class="text-decoration-line-through text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</span><br>
                                    <span class="fw-bold text-danger">Rp {{ number_format($product->promo_price, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-primary fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                @endif
                                <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                    <input type="hidden" name="product_image" value="{{ $product->image }}">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for each product -->
                    <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $product->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('images/products/' . $product->image) }}" 
                                         class="img-fluid" 
                                         style="max-height: 80vh;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info">
                            No products found in this category.
                        </div>
                    </div>
                @endif
            </div>

            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $page <= 1 ? 'disabled' : '' }}">
                        <a class="page-link" 
                           href="{{ $page <= 1 ? '#' : route('products', ['category' => $category, 'page' => $page - 1]) }}" 
                           tabindex="-1">Previous</a>
                    </li>
                    @for($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $page == $i ? 'active' : '' }}">
                            <a class="page-link" 
                               href="{{ route('products', ['category' => $category, 'page' => $i]) }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor
                    <li class="page-item {{ $page >= $totalPages ? 'disabled' : '' }}">
                        <a class="page-link" 
                           href="{{ $page >= $totalPages ? '#' : route('products', ['category' => $category, 'page' => $page + 1]) }}">
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection 