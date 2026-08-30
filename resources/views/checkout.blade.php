@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Checkout</h1>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4">Informasi Pembeli</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                        <input type="text" name="customer_name" required 
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon *</label>
                        <input type="text" name="customer_phone" required
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="customer_email"
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
                    <textarea name="customer_address" required rows="3"
                              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                    <textarea name="notes" rows="2"
                              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                              placeholder="Catatan untuk penjual..."></textarea>
                </div>
            </div>

            <div class="border-t pt-6">
                <h3 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h3>
                
                @php
                    $cart = session('cart', []);
                    $total = 0;
                @endphp
                
                @foreach($cart as $item)
                <div class="flex justify-between items-center py-2">
                    <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                    <span>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                </div>
                @php $total += $item['price'] * $item['quantity']; @endphp
                @endforeach
                
                <div class="border-t mt-4 pt-4">
                    <div class="flex justify-between items-center font-semibold text-lg">
                        <span>Total</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <button type="submit" 
                    class="w-full bg-green-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-300 mt-6">
                Konfirmasi Pesanan
            </button>
        </form>
    </div>
</div>
@endsection