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
    <aside class="w-64 bg-dark text-white p-6 hidden md:block">
        <div class="mb-10 flex items-center gap-3">
            <img src="{{ asset('images/logolensa.png') }}" alt="Logo" class="w-8">
            <span class="font-bold text-lg">BEM ADMIN</span>
        </div>
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-xl bg-primary text-dark font-bold transition-all">
                Manajemen Berita
            </a>
            <a href="{{ url('/') }}" target="_blank" class="block px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5 transition-all">
                Lihat Website
            </a>
            <div class="pt-10">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-red-400 hover:bg-red-400/10 transition-all">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold text-dark">Manajemen Berita</h1>
                <p class="text-gray-500">Kelola informasi terkini BEM KBM POLINES</p>
            </div>
            <a href="{{ route('admin.news.create') }}" class="px-6 py-3 bg-primary text-dark font-bold rounded-xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
                + Tambah Berita Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Berita</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Tanggal</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($beritas as $news)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                @if($news->image)
                                    <img src="{{ $news->image }}" class="w-12 h-12 rounded-lg object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-dark">{{ $news->title }}</p>
                                    <p class="text-xs text-gray-400 line-clamp-1">{{ $news->excerpt }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-600">{{ $news->category }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $news->date->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.news.edit', $news->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                                </a>
                                <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center text-gray-400 italic">
                            Belum ada berita yang ditambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
