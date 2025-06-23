<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category', 'all');
        $perPage = 6;
        $query = Product::query();

        if ($category === 'featured') {
            $query->where('featured', true);
        } elseif ($category === 'promo') {
            $query->where('promo', true);
        } elseif ($category !== 'all') {
            $query->where('category', $category);
        }

        $products = $query->paginate($perPage);

        return view('products', [
            'products' => $products,
            'category' => $category,
            'page' => $products->currentPage(),
            'totalPages' => $products->lastPage(),
        ]);
    }
} 