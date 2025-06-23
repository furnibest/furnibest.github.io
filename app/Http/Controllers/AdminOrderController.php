<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = \App\Models\Order::with(['user', 'items.product'])->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }
} 