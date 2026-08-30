@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Filters and Search -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form action="{{ route('products.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <!-- Search -->
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari produk..." class="w-full px-4 py-2 border rounded-lg">
            </div>
            
            <!-- Category Filter -->
            <div>
                <select name="category" class="w-full px-4 py-2 border rounded-lg">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Sort -->
            <div>
                <select name="sort" class="w-full px-4 py-2 border rounded-lg" onchange="this.form.submit()">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                </select>
            </div>
            
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                <div class="flex justify-between items-center mb-3">
                    <span class="text-lg font-bold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <span class="text-sm text-gray-500">Stok: {{ $product->stock }}</span>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('products.show', $product) }}" 
                       class="flex-1 bg-gray-500 text-white text-center py-2 rounded hover:bg-gray-600 transition duration-300">
                        Detail
                    </a>
                    <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-1">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" 
                                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition duration-300 {{ $product->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $product->stock == 0 ? 'disabled' : '' }}>
                            <i class="fas fa-cart-plus"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <i class="fas fa-search fa-3x text-gray-400 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600">Tidak ada produk ditemukan</h3>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection