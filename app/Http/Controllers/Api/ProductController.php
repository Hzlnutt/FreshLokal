<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        try {
            if (!Auth::guard('sanctum')->check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Silakan login terlebih dahulu.'
                ], Response::HTTP_UNAUTHORIZED);
            }

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
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data produk',
                'error' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function show($id)
    {
        try {
            if (!Auth::guard('sanctum')->check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Silakan login terlebih dahulu.'
                ], Response::HTTP_UNAUTHORIZED);
            }

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
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Produk tidak ditemukan',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function search(Request $request)
    {
        try {
            if (!Auth::guard('sanctum')->check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Silakan login terlebih dahulu.'
                ], Response::HTTP_UNAUTHORIZED);
            }

            $query = $request->get('q');
            
            if (empty($query)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Parameter pencarian (q) diperlukan'
                ], Response::HTTP_BAD_REQUEST);
            }

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
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mencari produk',
                'error' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
} 