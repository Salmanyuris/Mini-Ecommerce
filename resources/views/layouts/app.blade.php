<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - E-Commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
                        🛍️ E-Commerce
                    </a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-900">
                        Produk
                    </a>
                    <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-gray-900 relative">
                        <i class="fas fa-shopping-cart"></i>
                        @if(count(session('cart', [])) > 0)
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                                {{ count(session('cart', [])) }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 E-Commerce. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>