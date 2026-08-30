@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg p-8 mb-12">
        <div class="max-w-3xl">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di Toko Kami</h1>
            <p class="text-xl mb-6">Temukan produk terbaik dengan harga terjangkau</p>
            <a href="{{ route('products.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                Belanja Sekarang
            </a>
        </div>
    </section>

    <!-- Featured Products -->
    <section>
        <h2 class="text-3xl font-bold mb-8 text-center">Produk Terbaru</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($featured_products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                Lihat Semua Produk
            </a>
        </div>
    </section>
</div>
@endsection