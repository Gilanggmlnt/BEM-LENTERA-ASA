<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin BEM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFC900',
                        dark: '#1E1E1E',
                        'dark-light': '#4D4D4D'
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Pagination Styling */
        nav[role="navigation"] .relative.inline-flex.items-center {
            background-color: white !important;
            color: #4D4D4D !important;
            border-color: #E5E7EB !important;
            transition: all 0.2s;
        }
        nav[role="navigation"] .relative.inline-flex.items-center:hover {
            background-color: #F9FAFB !important;
            color: #FFC900 !important;
        }
        nav[role="navigation"] span[aria-current="page"] span {
            background-color: #FFC900 !important;
            border-color: #FFC900 !important;
            color: #1E1E1E !important;
            font-weight: bold;
        }
        nav[role="navigation"] svg {
            width: 1.25rem;
            height: 1.25rem;
        }
    </style>
</head>
<body class="bg-gray-50 flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-dark text-white p-6 hidden md:block flex-shrink-0">
        <div class="mb-10 flex items-center gap-3">
            <img src="{{ asset('images/logolensa.png') }}" alt="Logo" class="w-8">
            <span class="font-bold text-lg text-primary">BEM ADMIN</span>
        </div>
        <nav class="space-y-1">
            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 px-4">Menu Utama</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-dark font-bold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.news.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.news.*') ? 'bg-primary text-dark font-bold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
                Manajemen Berita
            </a>
            <a href="{{ route('admin.fungsionaris.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.fungsionaris.*') ? 'bg-primary text-dark font-bold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Fungsionaris
            </a>
            <a href="{{ route('admin.proker.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.proker.*') ? 'bg-primary text-dark font-bold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                Program Kerja
            </a>
            <a href="{{ route('admin.agenda.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.agenda.*') ? 'bg-primary text-dark font-bold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="m9 16 2 2 4-4"/></svg>
                Agenda
            </a>
            <a href="{{ route('admin.aspirasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.aspirasi.*') ? 'bg-primary text-dark font-bold' : 'text-gray-400 hover:text-white hover:bg-white/5' }} transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Suara Mahasiswa
            </a>

            <div class="pt-10">
                <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 px-4">Lainnya</p>
                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
                    Lihat Website
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-400/10 transition-all text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-8 overflow-y-auto">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
