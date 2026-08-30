@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Keranjang Belanja</h1>

    @if(count($cart) > 0)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            @foreach($cart as $item)
            <div class="flex items-center border-b border-gray-200 py-4 last:border-b-0">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded">
                
                <div class="flex-1 ml-4">
                    <h3 class="font-semibold text-lg">{{ $item['name'] }}</h3>
                    <p class="text-blue-600 font-bold">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                </div>

                <div class="flex items-center space-x-4">
                    <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                               class="w-16 px-2 py-1 border rounded text-center">
                    </form>
                    
                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-gray-50 px-6 py-4">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold">Total:</span>
                <span class="text-xl font-bold text-blue-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            
            <a href="{{ route('checkout') }}" class="block w-full bg-green-500 text-white text-center py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-300">
                Lanjut ke Checkout
            </a>
        </div>
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <i class="fas fa-shopping-cart fa-4x text-gray-400 mb-4"></i>
        <h3 class="text-xl font-semibold text-gray-600 mb-4">Keranjang belanja Anda kosong</h3>
        <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
            Mulai Belanja
        </a>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('input[name="quantity"]').forEach(input => {
        input.addEventListener('change', function() {
            this.form.submit();
        });
    });
</script>
@endpush