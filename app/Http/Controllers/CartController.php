<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        $cartCount = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $cartCount += $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total', 'cartCount'));
    }

    public function add(Product $product)
    {
        if ($product->status == 'habis') {
            return back()->with('error', 'Produk ini sudah habis');
        }

        // Cek stok tersedia
        if ($product->stock < 1) {
            return back()->with('error', 'Stok produk tidak mencukupi');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "category" => $product->category,
                "stock" => $product->stock // Simpan info stok di cart
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function decrease(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['quantity'] > 1) {
                $cart[$product->id]['quantity']--;
                session()->put('cart', $cart);
                return back()->with('success', 'Jumlah produk berhasil dikurangi');
            } else {
                return $this->remove($product);
            }
        }

        return back()->with('error', 'Produk tidak ditemukan di keranjang');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
            return back()->with('success', 'Produk berhasil dihapus dari keranjang');
        }

        return back()->with('error', 'Produk tidak ditemukan di keranjang');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang berhasil dikosongkan');
    }
}