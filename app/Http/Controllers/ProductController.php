<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::where('is_available', true)
                 ->latest()
                 ->paginate(9);
    
    // Get cart count for the navbar
    $cartCount = count(session()->get('cart', []));
    
    return view('dashboard', compact('products', 'cartCount'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
        ]);

        $product = new Product($request->all());
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/products'), $imageName);
            $product->image = 'images/products/' . $imageName;
        }

        $product->save();
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }
} 