@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Produk (Admin)</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Tambah Produk</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\Models\Product::all() as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset('images/products/' . $product->image) }}" width="80"/>
                    @else
                        -
                    @endif
                </td>
                <td>
                    {{ $product->name }}
                    @if($product->featured)
                        <span class="badge bg-success ms-1">Pilihan</span>
                    @endif
                    @if($product->promo)
                        <span class="badge bg-danger ms-1">Promo</span>
                    @endif
                </td>
                <td>
                    @if($product->promo)
                        <span class="text-decoration-line-through text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</span><br>
                        <span class="fw-bold text-danger">Rp {{ number_format($product->promo_price, 0, ',', '.') }}</span>
                    @else
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    @endif
                </td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 