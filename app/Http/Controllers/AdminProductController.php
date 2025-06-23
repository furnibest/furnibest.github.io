<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        // Tampilkan daftar produk
        return view('admin.products.index');
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'featured' => 'nullable|boolean',
            'promo' => 'nullable|boolean',
            'promo_price' => 'nullable|integer',
        ]);

        if ($request->promo) {
            $request->validate([
                'promo_price' => 'required|integer|lt:price',
            ]);
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
        }

        $product = new \App\Models\Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? null;
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->image = $imageName;
        $product->category = $validated['category'];
        $product->featured = $request->has('featured');
        $product->promo = $request->has('promo');
        $product->promo_price = $request->promo ? $request->promo_price : null;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function show($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }
    public function edit($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'featured' => 'nullable|boolean',
            'promo' => 'nullable|boolean',
            'promo_price' => 'nullable|integer',
        ]);

        if ($request->promo) {
            $request->validate([
                'promo_price' => 'required|integer|lt:price',
            ]);
        }

        if ($request->hasFile('image')) {
            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? null;
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->category = $validated['category'];
        $product->featured = $request->has('featured');
        $product->promo = $request->has('promo');
        $product->promo_price = $request->promo ? $request->promo_price : null;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate!');
    }
    public function destroy($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        if ($product->image && file_exists(public_path('images/products/' . $product->image))) {
            unlink(public_path('images/products/' . $product->image));
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
} 