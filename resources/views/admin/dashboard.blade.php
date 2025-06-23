@extends('layouts.app')
@section('content')
<style>
    .admin-dashboard-hero {
        background: linear-gradient(90deg,rgb(92, 92, 92) 60%, #fff 100%);
        color: #fff;
        padding: 36px 0 24px 0;
        border-radius: 0 0 24px 24px;
        margin-bottom: 32px;
    }
    .admin-dashboard-hero h1 {
        font-weight: 700;
        font-size: 2.2rem;
    }
    .admin-dashboard-cards {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
        margin-bottom: 32px;
    }
    .admin-dashboard-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.04);
        padding: 24px 32px;
        min-width: 220px;
        flex: 1 1 220px;
        color: #03ac0e;
        font-weight: 600;
        font-size: 1.1rem;
        border: 1.5px solid #e0ffe0;
        text-align: center;
    }
    .admin-dashboard-actions .btn {
        border-radius: 12px;
        font-weight: 600;
        margin-right: 12px;
        margin-bottom: 8px;
    }
</style>
<div class="admin-dashboard-hero">
    <div class="container">
        <h1 class="mb-2">Admin Dashboard</h1>
        <div class="mb-2">Selamat datang, {{ Auth::user()->name }}!</div>
        <div class="admin-dashboard-actions">
            <a href="{{ route('admin.products.index') }}" class="btn btn-light" style="color:#03ac0e;">Kelola Produk</a>
            <a href="{{ route('home') }}" class="btn btn-outline-light">Lihat Website</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="admin-dashboard-cards">
        <div class="admin-dashboard-card">
            <div class="mb-1" style="font-size:2rem;"><i class="bi bi-box-seam"></i></div>
            <div>Total Produk</div>
            <div style="font-size:1.5rem; font-weight:700;">{{ \App\Models\Product::count() }}</div>
        </div>
        <div class="admin-dashboard-card">
            <div class="mb-1" style="font-size:2rem;"><i class="bi bi-cart-check"></i></div>
            <div>Total Order</div>
            <div style="font-size:1.5rem; font-weight:700;">-</div>
        </div>
        <div class="admin-dashboard-card">
            <div class="mb-1" style="font-size:2rem;"><i class="bi bi-people"></i></div>
            <div>Total User</div>
            <div style="font-size:1.5rem; font-weight:700;">{{ \App\Models\User::count() }}</div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection 