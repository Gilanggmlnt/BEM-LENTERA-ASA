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
    </div>

    {{-- Flow Container --}}
    <div id="struktur-bem-container" data-nodes="{{ $nodes }}" data-edges="{{ $edges }}"></div>
</section>

@endsection