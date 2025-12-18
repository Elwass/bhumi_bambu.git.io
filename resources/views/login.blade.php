<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bhumi Bambu</title>

    <!-- Tailwind CDN (opsional jika belum setup build) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-green-700 mb-6">
            Login Bhumi Bambu
        </h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input 
                    type="email" 
                    name="email"
                    required
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500 outline-none"
                >
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Password</label>
                <input 
                    type="password" 
                    name="password"
                    required
                    class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500 outline-none"
                >
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full bg-green-700 hover:bg-green-800 text-white font-semibold py-2 mt-2 rounded-lg transition"
            >
                Login
            </button>

            <p class="text-center text-sm mt-4">
                Belum punya akun?
                <a href="/register" class="text-green-700 font-semibold">Daftar</a>
            </p>
        </form>
    </div>

</body>
</html>