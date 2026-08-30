<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|min:10',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email',
            'notes' => 'nullable|string|max:500'
        ]);

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        // Check stock availability
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            
            if (!$product) {
                return redirect()->route('cart.index')->with('error', 'Produk ' . $item['name'] . ' tidak ditemukan!');
            }
            
            if ($product->stock < $item['quantity']) {
                return redirect()->route('cart.index')->with('error', 
                    'Stok produk ' . $item['name'] . ' tidak mencukupi! Stok tersedia: ' . $product->stock);
            }
        }

        // Create orders
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            
            Order::create([
                'order_number' => 'ORD-' . date('Ymd') . '-' . Str::random(6),
                'customer_name' => $request->customer_name,
                'customer_address' => $request->customer_address,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity'],
                'status' => 'pending',
                'notes' => $request->notes
            ]);
            
            // Update stock
            $product->decrement('stock', $item['quantity']);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('home')->with('success', 
            'Pesanan berhasil dibuat! Kami akan menghubungi Anda segera untuk konfirmasi.');
    }

    public function show($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
                     ->with('product')
                     ->firstOrFail();
        
        return view('orders.show', compact('order'));
    }
}