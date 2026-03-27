@extends('layouts.app')
@section('title', $proker->nama_proker)
@section('content')

{{-- NAVBAR STICKY STYLE --}}
<style>
/* STICKY NAVBAR */
nav.is-sticky {
    position: fixed;
    top: 1.5rem;
    animation: slideInDown 0.5s ease-out forwards;
}

@keyframes slideInDown {
    from {
        transform: translateY(-150%);
    }
    to {
        transform: translateY(0);
    }
}
</style>

<div class="min-h-screen bg-[#F9F9F9] text-dark">
    <div class="pt-32 pb-12">
        <div class="container-main mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Back Button --}}
            <div class="mb-8">
                <a href="{{ url()->previous() == url()->current() ? route('kementerian.show', Str::slug($proker->kementerian->nama_kementerian)) : url()->previous() }}" class="inline-flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                    <span>Kembali</span>
                </a>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Main Content (Left) --}}
                <div class="space-y-8">
                    {{-- Flyer/Pamflet Card --}}
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                        <div class="p-5 border-b border-gray-100">
                            <h3 class="font-bold text-dark flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ticket text-primary"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M13 5v2"/><path d="M13 17v2"/><path d="M13 11v2"/></svg>
                                Flyer Program
                            </h3>
                        </div>
                        <div class="p-4 bg-gray-50">
                            @if($proker->pamflet && file_exists(public_path($proker->pamflet)))
                                <img src="{{ asset($proker->pamflet) }}" alt="Flyer {{ $proker->nama_proker }}" class="w-full h-auto rounded-lg shadow-md">
                            @else
                                <div class="aspect-[3/4] bg-primary/5 rounded-lg border-2 border-dashed border-primary/20 flex flex-col items-center justify-center text-primary p-6 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image mb-4 opacity-50"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                    <p class="text-sm font-medium">Flyer belum tersedia</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- Sidebar (Right) --}}
                <div class="lg:col-span-2 space-y-8">
                    {{-- Header Card --}}
                    <div class="bg-dark rounded-2xl p-8 text-white relative overflow-hidden">
                        {{-- Background Decoration --}}
                        <div class="absolute top-0 right-0 w-64 h-64 bg-primary opacity-10 blur-3xl -mr-32 -mt-32"></div>
                        
                        <div class="relative z-10">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="px-3 py-1 bg-primary text-dark text-xs font-bold rounded-full uppercase tracking-wider">
                                    Program Kerja
                                </span>
                                <span class="px-3 py-1 {{ $statusColor }} text-xs font-bold rounded-full uppercase tracking-wider">
                                    {{ $status }}
                                </span>
                            </div>
                            <h1 class="text-3xl md:text-4xl font-bold mb-4 leading-tight">
                                {{ $proker->nama_proker }}
                            </h1>
                            <div class="flex flex-wrap items-center gap-6 text-gray-300">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building-2 text-primary"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
                                    <span class="text-sm">{{ $proker->kementerian->nama_kementerian }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar text-primary"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                                    <span class="text-sm">{{ \Carbon\Carbon::parse($proker->tanggal_pelaksanaan)->format('d F Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Ketuplak Card --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                        <h3 class="font-bold text-dark mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-circle-2 text-primary"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
                            Ketua Pelaksana
                        </h3>
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-primary/20 flex-shrink-0">
                                @if($ketuplak && $ketuplak->photo_path && file_exists(public_path('images/foto_fungsionaris/' . $ketuplak->photo_path)))
                                    <img src="{{ asset('images/foto_fungsionaris/' . $ketuplak->photo_path) }}" alt="{{ $proker->nama_ketuplak }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-dark leading-tight">{{ $proker->nama_ketuplak }}</h4>
                                <p class="text-sm text-primary">
                                    {{ $ketuplak ? $ketuplak->jabatan->nama_jabatan : 'Ketua Pelaksana' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- Description --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-dark mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info text-primary"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                            Deskripsi Program
                        </h2>
                        <div class="prose prose-slate max-w-none text-gray-600 leading-relaxed">
                            {!! nl2br(e($proker->deskripsi_proker)) !!}
                        </div>
                    </div>

                    {{-- Documentation Gallery --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-dark mb-6 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images text-primary"><path d="M18 22H4a2 2 0 0 1-2-2V6"/><path d="M22 18H8a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2z"/><circle cx="13" cy="9" r="2"/><path d="m24 13-3.91-3.91a2 2 0 0 0-2.82 0L13.5 13"/></svg>
                            Dokumentasi Kegiatan
                        </h2>
                        
                        @php
                            $hasDocumentation = false;
                            if($proker->dokumentasi_array) {
                                foreach($proker->dokumentasi_array as $img) {
                                    if(file_exists(public_path(trim($img)))) {
                                        $hasDocumentation = true;
                                        break;
                                    }
                                }
                            }
                        @endphp

                        @if($hasDocumentation)
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($proker->dokumentasi_array as $img)
                                    @php $imgPath = trim($img); @endphp
                                    @if(file_exists(public_path($imgPath)))
                                    <div class="aspect-square rounded-xl overflow-hidden border border-gray-100 group">
                                        <img src="{{ asset($imgPath) }}" alt="Dokumentasi {{ $proker->nama_proker }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="py-12 flex flex-col items-center justify-center text-gray-400 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera-off mb-4 opacity-50"><line x1="2" x2="22" y1="2" y2="22"/><path d="M7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16"/><path d="M9.5 4h5L17 7h3a2 2 0 0 1 2 2v3.5"/><path d="M14.121 15.121A3 3 0 1 1 12 8.879"/><circle cx="12" cy="12" r="3" class="opacity-0"/></svg>
                                <p class="text-sm font-medium">Dokumentasi belum tersedia</p>
                            </div>
                        @endif
                    </div>
                </div>
                

                    
                
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        gsap.registerPlugin(ScrollTrigger);

        const navbar = document.querySelector("nav");
        if (navbar) {
            gsap.set(navbar, {
                position: "absolute",
                top: "1.5rem",
                y: 0
            });

            ScrollTrigger.create({
                start: 100,
                onEnter: () => {
                    gsap.to(navbar, {
                        position: "fixed",
                        top: "1rem",
                        y: 0,
                        duration: 0.3,
                        ease: "power2.out"
                    });
                },
                onLeaveBack: () => {
                    gsap.to(navbar, {
                        position: "absolute",
                        top: "1.5rem",
                        y: 0,
                        duration: 0.3,
                        ease: "power2.out"
                    });
                }
            });
        }
    });
</script>

@endsection
