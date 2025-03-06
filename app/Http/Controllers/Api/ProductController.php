<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_available', true)
                        ->where('stock', '>', 0)
                        ->get()
                        ->map(function ($product) {
                            return [
                                'id' => $product->id,
                                'name' => $product->name,
                                'description' => $product->description,
                                'price' => $product->price,
                                'formatted_price' => 'Rp ' . number_format($product->price, 0, ',', '.'),
                                'image' => asset($product->image),
                                'stock' => $product->stock,
                                'status' => $product->status,
                                'category' => $product->category
                            ];
                        });

        return response()->json([
            'status' => 'success',
            'data' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'formatted_price' => 'Rp ' . number_format($product->price, 0, ',', '.'),
                'image' => asset($product->image),
                'stock' => $product->stock,
                'status' => $product->status,
                'category' => $product->category
            ]
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $products = Product::where('is_available', true)
                        ->where('stock', '>', 0)
                        ->where(function($q) use ($query) {
                            $q->where('name', 'like', "%{$query}%")
                              ->orWhere('description', 'like', "%{$query}%")
                              ->orWhere('category', 'like', "%{$query}%");
                        })
                        ->get()
                        ->map(function ($product) {
                            return [
                                'id' => $product->id,
                                'name' => $product->name,
                                'description' => $product->description,
                                'price' => $product->price,
                                'formatted_price' => 'Rp ' . number_format($product->price, 0, ',', '.'),
                                'image' => asset($product->image),
                                'stock' => $product->stock,
                                'status' => $product->status,
                                'category' => $product->category
                            ];
                        });

        return response()->json([
            'status' => 'success',
            'data' => $products
        ]);
    }
} 