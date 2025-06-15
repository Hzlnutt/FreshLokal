<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('orders.success', ['order' => $order])->with('success', 'Pesanan berhasil dibuat!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
        }
        
        $total = 0;
        $cartCount = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $cartCount += $item['quantity'];
        }

        return view('orders.checkout', compact('cart', 'total', 'cartCount'));
    }
    
    public function processCheckout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'phone_number' => 'required|string',
            'no_rekening' => 'required|string',
            'notes' => 'nullable|string'
        ]);
        
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
        }
        
        // Validasi stok sebelum membuat order
        foreach ($cart as $item) {
            $product = Product::findOrFail($item['id']);
            if ($product->stock < $item['quantity']) {
                return redirect()->route('cart.index')->with('error', 'Stok produk ' . $product->name . ' tidak mencukupi');
            }
        }
        
        $orders = [];
        
        foreach ($cart as $item) {
            $product = Product::findOrFail($item['id']);
            
            // Buat order
            $order = Order::create([
                'user_id' => Auth::id(),
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity'],
                'shipping_address' => $request->shipping_address,
                'phone_number' => $request->phone_number,
                'no_rekening' => $request->no_rekening,
                'notes' => $request->notes,
                'status' => 'pending'
            ]);
            
            // Kurangi stok produk
            $product->stock -= $item['quantity'];
            $product->save();
            
            $orders[] = $order;
        }
        
        session()->forget('cart');
        
        return redirect()->route('orders.success', ['order' => $orders[0]]);
    }

    public function success(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
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