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
        $totalItems = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $totalItems += $item['quantity'];
        }
        
        return view('cart.index', compact('cart', 'total', 'totalItems'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock
        ]);

        $cart = session()->get('cart', []);
        
        if (isset($cart[$product->id])) {
            $newQuantity = $cart[$product->id]['quantity'] + $request->quantity;
            
            if ($newQuantity > $product->stock) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $product->stock);
            }
            
            $cart[$product->id]['quantity'] = $newQuantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image_url,
                'quantity' => $request->quantity,
                'stock' => $product->stock,
                'slug' => $product->slug
            ];
        }
        
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $product = Product::find($id);
            
            if ($request->quantity > $product->stock) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $product->stock);
            }
            
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            
            return redirect()->back()->with('success', 'Keranjang berhasil diperbarui!');
        }
        
        return redirect()->back()->with('error', 'Produk tidak ditemukan dalam keranjang!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            
            return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
        }
        
        return redirect()->back()->with('error', 'Produk tidak ditemukan dalam keranjang!');
    }

    public function clear()
    {
        session()->forget('cart');
        
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan!');
    }
}