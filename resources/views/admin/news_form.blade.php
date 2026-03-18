<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($berita) ? 'Edit' : 'Tambah' }} Berita - Admin BEM</title>
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
<body class="bg-gray-50 flex min-h-screen">
    <main class="max-w-4xl mx-auto w-full p-8">
        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="p-2 bg-white rounded-xl border border-gray-200 text-gray-400 hover:text-dark transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </a>
            <h1 class="text-3xl font-bold text-dark">{{ isset($berita) ? 'Edit' : 'Tambah' }} Berita</h1>
        </div>

        <form action="{{ isset($berita) ? route('admin.news.update', $berita->id) : route('admin.news.store') }}" 
              method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-6">
            @csrf
            @if(isset($berita))
                @method('PUT')
            @endif

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title', $berita->title ?? '') }}" required 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                        <option value="Kegiatan" {{ (old('category', $berita->category ?? '') == 'Kegiatan') ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Workshop" {{ (old('category', $berita->category ?? '') == 'Workshop') ? 'selected' : '' }}>Workshop</option>
                        <option value="Pengabdian" {{ (old('category', $berita->category ?? '') == 'Pengabdian') ? 'selected' : '' }}>Pengabdian</option>
                        <option value="Informasi" {{ (old('category', $berita->category ?? '') == 'Informasi') ? 'selected' : '' }}>Informasi</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="date" value="{{ old('date', isset($berita) ? $berita->date->format('Y-m-d') : date('Y-m-d')) }}" required 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Unggah Gambar (Maks 2MB)</label>
                    <input type="file" name="image" accept="image/*" {{ isset($berita) ? '' : 'required' }}
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                    
                    @if(isset($berita) && $berita->image)
                        <p class="mt-2 text-xs text-gray-400 italic">Gambar saat ini: {{ $berita->image }}</p>
                    @endif
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan (Excerpt) <span class="text-xs text-gray-400 font-normal">(Opsional)</span></label>
                <textarea name="excerpt" rows="2" 
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('excerpt', $berita->excerpt ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Lengkap</label>
                <textarea name="description" rows="10" required 
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('description', $berita->description ?? '') }}</textarea>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="w-full py-4 bg-primary text-dark font-bold rounded-xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
                    {{ isset($berita) ? 'Simpan Perubahan' : 'Terbitkan Berita' }}
                </button>
            </div>
        </form>
    </main>
</body>
</html>
