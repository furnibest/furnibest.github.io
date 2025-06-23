<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function checkout(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong.');
        }
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending',
        ]);
        foreach ($cart as $productId => $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Checkout berhasil! Pesanan Anda telah diterima.');
    }

    // Tambahkan fungsi untuk remove, update, clear cart jika diperlukan
}
