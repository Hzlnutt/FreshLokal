<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
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

            $users = User::all()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'email_verified_at' => $user->email_verified_at,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at
                ];
            });

            return response()->json([
                'status' => 'success',
                'data' => $users
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data user',
                'error' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
} 