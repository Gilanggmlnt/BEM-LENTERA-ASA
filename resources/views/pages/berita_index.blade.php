@extends('layouts.app')
@section('title', 'Berita')
@section('content')

<div class="w-full min-h-screen bg-[#F9F9F9] text-dark pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Page Header --}}
        <div class="mb-16">
            <h1 class="text-4xl md:text-6xl font-bold text-dark mb-4">
                Berita <span class="text-primary">Lengkap</span>
            </h1>
            <p class="text-gray-500 max-w-2xl text-sm md:text-base">
                Kumpulan informasi, artikel, dan dokumentasi seluruh kegiatan Badan Eksekutif Mahasiswa KBM Politeknik Negeri Semarang.
            </p>
        </div>

        @if($newsItems->count() > 0)
        {{-- News Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach($newsItems as $news)
            <div class="news-card">
                <a href="{{ route('berita.show', $news->slug) }}" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all h-full flex flex-col border border-gray-100">
                    <div class="aspect-video relative overflow-hidden">
                        <img src="{{ asset('images/berita/' . $news->image) }}" alt="{{ $news->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-6 left-6">
                            <span class="bg-primary text-dark text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg">
                                {{ $news->category }}
                            </span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-gray-400 text-xs mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                            <span>{{ \Carbon\Carbon::parse($news->date)->format('d F Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-4 group-hover:text-primary transition-colors leading-tight">
                            {{ $news->title }}
                        </h3>
                        <p class="text-gray-500 text-sm flex-1 mb-6 leading-relaxed line-clamp-3">
                            {{ $news->excerpt ?? Str::limit($news->description, 120) }}
                        </p>
                        <div class="flex items-center gap-2 text-primary font-bold text-sm group-hover:gap-4 transition-all">
                            Baca Selengkapnya 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center">
            {{ $newsItems->links() }}
        </div>

        @else
        <div class="bg-white rounded-3xl border border-dashed border-gray-300 p-16 text-center shadow-sm opacity-60">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper mx-auto mb-6 text-gray-300"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
            <h3 class="text-xl font-bold text-gray-400 mb-2">Belum Ada Berita</h3>
            <p class="text-gray-400">Kami akan segera mengupdate informasi terbaru untuk Anda.</p>
        </div>
        @endif
    </div>
</div>

@endsection
