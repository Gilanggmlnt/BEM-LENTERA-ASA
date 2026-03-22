@extends('layouts.app')
@section('title', 'Struktur')
@section('content')

<section class="text-center py-20">
    <h1 class="text-4xl font-bold">Struktur Organisasi BEM KBM POLINES</h1>
</section>

<section id="struktur-bem" class="w-full min-h-screen bg-gray-50 py-16">
    {{-- Title --}}
    <div class="text-center mb-10">
        <h2 class="text-3xl md:text-4xl font-bold">
            Struktur BEM KBM POLINES
        </h2>
        <p class="text-gray-500 mt-2">
            Organigram Kepengurusan
        </p>
        <div class="mt-4 inline-flex items-center gap-2 bg-primary/10 text-primary px-4 py-2 rounded-full text-xs md:text-sm font-medium border border-primary/20">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            <span>Klik pada kementerian untuk melihat detail anggota dan program kerja</span>
        </div>
    </div>

    {{-- Flow Container --}}
    <div id="struktur-bem-container" data-nodes="{{ $nodes }}" data-edges="{{ $edges }}"></div>
</section>

@endsection