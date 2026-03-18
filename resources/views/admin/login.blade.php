<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - BEM KBM POLINES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFC900',
                        dark: '#1E1E1E',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full p-8 bg-white rounded-3xl shadow-xl border border-gray-100">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logolensa.png') }}" alt="Logo" class="w-16 mx-auto mb-4">
            <h1 class="text-2xl font-bold text-dark">Login Dashboard Admin</h1>
            <p class="text-gray-500 text-sm">Silakan masuk untuk mengelola berita BEM</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm rounded-r-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none">
            </div>

            <button type="submit" 
                    class="w-full py-3 bg-primary hover:bg-yellow-400 text-dark font-bold rounded-xl shadow-lg shadow-primary/20 transition-all transform hover:-translate-y-0.5">
                Masuk ke Dashboard
            </button>
        </form>

        <p class="mt-8 text-center text-xs text-gray-400">
            &copy; 2026 BEM KBM Politeknik Negeri Semarang
        </p>
    </div>
</body>
</html>
