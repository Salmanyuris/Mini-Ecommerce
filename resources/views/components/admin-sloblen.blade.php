<aside class="w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4">
        <h2 class="text-xl font-bold">Admin Panel</h2>
    </div>
    <nav class="mt-6">
        <a href="{{ route('admin.dashboard') }}" 
           class="block py-2 px-4 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            📊 Dashboard
        </a>
        <a href="{{ route('admin.products.index') }}" 
           class="block py-2 px-4 {{ request()->routeIs('admin.products.*') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            🛍️ Produk
        </a>
        <a href="{{ route('admin.categories.index') }}" 
           class="block py-2 px-4 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            📂 Kategori
        </a>
        <a href="{{ route('admin.orders.index') }}" 
           class="block py-2 px-4 {{ request()->routeIs('admin.orders.*') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            📦 Pesanan
        </a>
        <form method="POST" action="{{ route('admin.logout') }}" class="mt-4">
            @csrf
            <button type="submit" class="block w-full text-left py-2 px-4 hover:bg-gray-700 text-red-400">
                🚪 Logout
            </button>
        </form>
    </nav>
</aside>