<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(Product $product)
    {
        return view('orders.show', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'shipping_address' => 'required|string',
            'phone_number' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->product_id = $product->id;
        $order->quantity = $request->quantity;
        $order->total_price = $product->price * $request->quantity;
        $order->shipping_address = $request->shipping_address;
        $order->phone_number = $request->phone_number;
        $order->notes = $request->notes;
        $order->save();

        return redirect()->route('orders.success', $order)->with('success', 'Pesanan berhasil dibuat!');
    }

    public function success(Order $order)
    {
        return view('orders.success', compact('order'));
    }

    public function history()
    {
        $orders = Order::where('user_id', auth()->id())
                      ->with('product')
                      ->latest()
                      ->paginate(10);
        
        return view('orders.history', compact('orders'));
    }
} 