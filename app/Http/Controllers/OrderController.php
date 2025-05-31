<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
            'no_rekening' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        // Reduce product stock
        $product->decrement('stock', $request->quantity);

        if ($product->stock < 0) {
            return redirect()->back()->withErrors(['quantity' => 'Stok produk tidak mencukupi.']);
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
            'shipping_address' => $request->shipping_address,
            'phone_number' => $request->phone_number,
            'no_rekening' => $request->no_rekening,
            'notes' => $request->notes,
            'status' => 'pending'
        ]);

        // Redirect langsung ke success
        return redirect()->route('orders.success', ['order' => $order])->with('success', 'Pesanan berhasil dibuat!');
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