<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        try {
            // Cek apakah user sudah login
            if (!Auth::guard('sanctum')->check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Silakan login terlebih dahulu.'
                ], Response::HTTP_UNAUTHORIZED);
            }

            // Cek apakah user adalah admin
            if (!Auth::guard('sanctum')->user()->isAdmin()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Forbidden. Anda tidak memiliki akses.'
                ], Response::HTTP_FORBIDDEN);
            }

            $orders = Order::with(['user', 'product'])
                        ->latest()
                        ->get()
                        ->map(function ($order) {
                            return [
                                'id' => $order->id,
                                'user' => [
                                    'id' => $order->user->id,
                                    'name' => $order->user->name,
                                    'email' => $order->user->email
                                ],
                                'product' => [
                                    'id' => $order->product->id,
                                    'name' => $order->product->name,
                                    'price' => $order->product->price
                                ],
                                'quantity' => $order->quantity,
                                'total_price' => $order->total_price,
                                'formatted_total_price' => 'Rp ' . number_format($order->total_price, 0, ',', '.'),
                                'status' => $order->status,
                                'shipping_address' => $order->shipping_address,
                                'phone_number' => $order->phone_number,
                                'notes' => $order->notes,
                                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                                'updated_at' => $order->updated_at->format('Y-m-d H:i:s')
                            ];
                        });

            return response()->json([
                'status' => 'success',
                'data' => $orders
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data pesanan',
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

            if (!Auth::guard('sanctum')->user()->isAdmin()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Forbidden. Anda tidak memiliki akses.'
                ], Response::HTTP_FORBIDDEN);
            }

            $order = Order::with(['user', 'product'])->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => [
                    'id' => $order->id,
                    'user' => [
                        'id' => $order->user->id,
                        'name' => $order->user->name,
                        'email' => $order->user->email
                    ],
                    'product' => [
                        'id' => $order->product->id,
                        'name' => $order->product->name,
                        'price' => $order->product->price
                    ],
                    'quantity' => $order->quantity,
                    'total_price' => $order->total_price,
                    'formatted_total_price' => 'Rp ' . number_format($order->total_price, 0, ',', '.'),
                    'status' => $order->status,
                    'shipping_address' => $order->shipping_address,
                    'phone_number' => $order->phone_number,
                    'notes' => $order->notes,
                    'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $order->updated_at->format('Y-m-d H:i:s')
                ]
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pesanan tidak ditemukan',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            if (!Auth::guard('sanctum')->check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Silakan login terlebih dahulu.'
                ], Response::HTTP_UNAUTHORIZED);
            }

            if (!Auth::guard('sanctum')->user()->isAdmin()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Forbidden. Anda tidak memiliki akses.'
                ], Response::HTTP_FORBIDDEN);
            }

            $request->validate([
                'status' => 'required|in:pending,accepted,paid,shipped,completed'
            ]);

            $order = Order::findOrFail($id);
            $order->status = $request->status;
            $order->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status pesanan berhasil diupdate',
                'data' => [
                    'id' => $order->id,
                    'status' => $order->status
                ]
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengupdate status pesanan',
                'error' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
} 