@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="md:flex">
            <div class="md:flex-1 p-6">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                     class="w-full h-96 object-cover rounded-lg">
            </div>
            
            <div class="md:flex-1 p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                
                <div class="mb-4">
                    <span class="text-2xl font-bold text-blue-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                    <span class="ml-2 text-sm text-gray-500">
                        Stok: {{ $product->stock }}
                    </span>
                </div>
                
                <div class="mb-6">
                    <p class="text-gray-700">{{ $product->description }}</p>
                </div>
                
                @if($product->stock > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST" class="flex items-center space-x-4">
                    @csrf
                    <div class="flex items-center">
                        <label class="mr-2">Qty:</label>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                               class="w-20 px-3 py-2 border rounded-lg">
                    </div>
                    <button type="submit" 
                            class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                        <i class="fas fa-cart-plus mr-2"></i>Tambahkan ke Keranjang
                    </button>
                </form>
                @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    Stok habis
                </div>
                @endif
                
                <div class="mt-8 pt-6 border-t">
                    <h3 class="font-semibold mb-2">Kategori:</h3>
                    <span class="bg-gray-200 px-3 py-1 rounded-full text-sm">
                        {{ $product->category->name }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection