<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - E-Commerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center mb-8">Login Admin</h2>
        
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf <!-- INI YANG PERLU DITAMBAHKAN -->
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input type="email" name="email" id="email" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                       value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input type="password" name="password" id="password" 
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                       required>
            </div>

            <button type="submit" 
                    class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                Login
            </button>
        </form>
    </div>
</body>
</html>