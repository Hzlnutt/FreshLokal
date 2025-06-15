<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Basic statistics
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalRevenue = Order::where('status', 'accepted')->sum('total_price');
        
        // Recent orders
        $recentOrders = Order::with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

         // Data grafik pendapatan harian bulan ini
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $daysInMonth = Carbon::now()->daysInMonth;
        
        $revenueData = [];
        $dayLabels = [];
        
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::create($currentYear, $currentMonth, $day);
            
            $revenue = Order::where('status', 'accepted')
                ->whereDate('created_at', $date->format('Y-m-d'))
                ->sum('total_price');
            
            $revenueData[] = $revenue ?: 0;
            $dayLabels[] = $date->format('d M');
        }

        // Order status distribution for pie chart
        $orderStatusData = [
            'pending' => Order::where('status', 'pending')->count(),
            'accepted' => Order::where('status', 'accepted')->count(),
            'paid' => Order::where('status', 'paid')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'completed' => Order::where('status', 'completed')->count(),
        ];

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalUsers',
            'totalRevenue',
            'recentOrders',
            'revenueData',
            'orderStatusData',
            'dayLabels' // Tambahkan ini
        ));
    }

    public function products(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $image = $request->file('image');
        $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/products'), $imageName);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->stock > 0 ? 'ada' : 'habis',
            'image' => 'images/products/' . $imageName
        ]);

        return redirect()->route('admin.products')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->stock > 0 ? 'ada' : 'habis',
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            $oldImagePath = public_path($product->image);
            if ($product->image && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $data['image'] = 'images/products/' . $imageName;
        }

        $product->update($data);

        return redirect()->route('admin.products')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroyProduct(Product $product)
    {
        // Hapus gambar dari public
        $imagePath = public_path($product->image);
        if ($product->image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();

        return redirect()->route('admin.products')
            ->with('success', 'Produk berhasil dihapus!');
    }

    public function orders()
    {
        $orders = Order::with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.orders', compact('orders'));
    }

    public function users(Request $request)
    {
        $query = User::where('role', 'user')
            ->withCount(['orders' => function($q) {
                $q->where('status', 'completed');
            }]);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users', compact('users'));
    }

    public function updateOrderStatus(Order $order, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,paid,shipped,completed'
        ]);

        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui');
    }
}