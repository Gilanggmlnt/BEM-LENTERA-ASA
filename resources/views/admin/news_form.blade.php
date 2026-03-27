@extends('admin.layout')
@section('title', (isset($berita) ? 'Edit' : 'Tambah') . ' Berita')
@section('content')

<div class="mb-10">
    <a href="{{ route('admin.news.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-primary transition-all mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Kembali ke Daftar Berita
    </a>
    <h1 class="text-3xl font-bold text-dark">{{ isset($berita) ? 'Edit' : 'Tambah' }} Berita</h1>
    <p class="text-gray-500">Silakan isi formulir di bawah ini untuk {{ isset($berita) ? 'memperbarui' : 'menerbitkan' }} berita.</p>
</div>

@if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl shadow-sm max-w-4xl">
        <p class="font-bold mb-1 text-sm">Terjadi kesalahan pada data yang Anda masukkan:</p>
        <ul class="list-disc list-inside text-xs">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($berita) ? route('admin.news.update', $berita->id) : route('admin.news.store') }}" 
      method="POST" enctype="multipart/form-data" 
      class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 space-y-6 max-w-4xl">
    @csrf
    @if(isset($berita))
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
            <input type="text" name="title" value="{{ old('title', $berita->title ?? '') }}" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="category" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all bg-white">
                <option value="">Pilih Kategori</option>
                <option value="Informasi" {{ old('category', $berita->category ?? '') == 'Informasi' ? 'selected' : '' }}>Informasi</option>
                <option value="Kegiatan" {{ old('category', $berita->category ?? '') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                <option value="Prestasi" {{ old('category', $berita->category ?? '') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                <option value="Opini" {{ old('category', $berita->category ?? '') == 'Opini' ? 'selected' : '' }}>Opini</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Terbit</label>
            <input type="date" name="date" value="{{ old('date', isset($berita) ? $berita->date->format('Y-m-d') : date('Y-m-d')) }}" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Berita</label>
            @if(isset($berita) && $berita->image)
                <div class="mb-4">
                    <img src="{{ asset('images/berita/' . $berita->image) }}" class="w-48 rounded-xl border border-gray-100">
                </div>
            @endif
            <input type="file" name="image" {{ isset($berita) ? '' : 'required' }}
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
            <p class="text-[10px] text-gray-400 mt-1">Format: JPG, PNG, WEBP. Maks: 3MB.</p>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Ringkasan (Excerpt) <span class="text-xs text-gray-400 font-normal">(Opsional)</span></label>
            <textarea name="excerpt" rows="2" 
                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('excerpt', $berita->excerpt ?? '') }}</textarea>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Link Sumber <span class="text-xs text-gray-400 font-normal">(Opsional)</span></label>
            <input type="url" name="link" value="{{ old('link', $berita->link ?? '') }}" placeholder="https://..."
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Lengkap</label>
            <textarea name="description" rows="8" required
                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('description', $berita->description ?? '') }}</textarea>
        </div>
    </div>

    <div class="pt-4">
        <button type="submit" 
                class="w-full md:w-auto px-10 py-4 bg-primary text-dark font-bold rounded-2xl shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all">
            {{ isset($berita) ? 'Simpan Perubahan' : 'Terbitkan Berita' }}
        </button>
    </div>
</form>

@endsection
