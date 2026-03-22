<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BEM KBM POLINES</title>
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
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-dark">Dashboard Overview</h1>
            <p class="text-gray-500">Selamat datang di panel kendali BEM KBM POLINES</p>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
                </div>
                <p class="text-gray-400 text-sm font-medium">Total Berita</p>
                <p class="text-3xl font-bold text-dark">{{ $beritasCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <p class="text-gray-400 text-sm font-medium">Fungsionaris</p>
                <p class="text-3xl font-bold text-dark">{{ $fungsionarisCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                <p class="text-gray-400 text-sm font-medium">Program Kerja</p>
                <p class="text-3xl font-bold text-dark">{{ $prokersCount }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="m9 16 2 2 4-4"/></svg>
                </div>
                <p class="text-gray-400 text-sm font-medium">Total Agenda</p>
                <p class="text-3xl font-bold text-dark">{{ $agendasCount }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Recent News --}}
            <div class="lg:col-span-2">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-dark">Berita Terbaru</h2>
                    <a href="{{ route('admin.news.index') }}" class="text-sm font-bold text-primary hover:underline">Lihat Semua</a>
                </div>
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Judul</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Kategori</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($beritas as $news)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-bold text-dark text-sm line-clamp-1">{{ $news->title }}</p>
                                    <p class="text-[10px] text-gray-400">{{ $news->date->format('d M Y') }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-gray-100 text-[10px] font-bold text-gray-600 rounded-md uppercase">{{ $news->category }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.news.edit', $news->id) }}" class="text-blue-600 hover:underline text-xs font-bold">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Quick Actions / System Info --}}
            <div>
                <h2 class="text-xl font-bold text-dark mb-6">Aksi Cepat</h2>
                <div class="space-y-4">
                    <a href="{{ route('admin.news.create') }}" class="flex items-center justify-between p-4 bg-white rounded-2xl border border-gray-100 hover:border-primary group transition-all">
                        <span class="font-bold text-dark group-hover:text-primary">Tambah Berita</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 group-hover:text-primary"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    </a>
                    <a href="{{ route('admin.fungsionaris.create') }}" class="flex items-center justify-between p-4 bg-white rounded-2xl border border-gray-100 hover:border-primary group transition-all">
                        <span class="font-bold text-dark group-hover:text-primary">Tambah Fungsionaris</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 group-hover:text-primary"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    </a>
                    <a href="{{ route('admin.proker.create') }}" class="flex items-center justify-between p-4 bg-white rounded-2xl border border-gray-100 hover:border-primary group transition-all">
                        <span class="font-bold text-dark group-hover:text-primary">Tambah Proker</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 group-hover:text-primary"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    </a>
                    <a href="{{ route('admin.agenda.create') }}" class="flex items-center justify-between p-4 bg-white rounded-2xl border border-gray-100 hover:border-primary group transition-all">
                        <span class="font-bold text-dark group-hover:text-primary">Tambah Agenda</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 group-hover:text-primary"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
