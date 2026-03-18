@extends('layouts.app')
@section('title', $berita->title)

@push('meta')
    {{-- Open Graph / Facebook / Instagram --}}
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $berita->title }}">
    <meta property="og:description" content="{{ Str::limit($berita->description, 160) }}">
    <meta property="og:image" content="{{ asset('images/berita/' . $berita->image) }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $berita->title }}">
    <meta property="twitter:description" content="{{ Str::limit($berita->description, 160) }}">
    <meta property="twitter:image" content="{{ asset('images/berita/' . $berita->image) }}">
@endpush

@section('content')

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

<div class="min-h-screen bg-[#F9F9F9] text-dark pt-32 pb-20">
    <div class="container-main mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        {{-- Back Button --}}
        <div class="mb-8">
            <a href="{{ url('/#berita') }}" class="inline-flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>

        {{-- Category & Date --}}
        <div class="flex items-center gap-4 mb-6">
            <span class="bg-primary text-dark text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-sm">
                {{ $berita->category }}
            </span>
            <div class="flex items-center gap-2 text-gray-400 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                <span>{{ \Carbon\Carbon::parse($berita->date)->format('d F Y') }}</span>
            </div>
        </div>

        {{-- Title --}}
        <h1 class="text-3xl md:text-5xl font-bold text-dark mb-8 leading-tight">
            {{ $berita->title }}
        </h1>

        {{-- Featured Image --}}
        <div class="rounded-3xl overflow-hidden mb-12 shadow-xl aspect-video">
            <img src="{{ asset('images/berita/' . $berita->image) }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
        </div>

        {{-- Content --}}
        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
            <p class="whitespace-pre-line">{{ $berita->description }}</p>
        </div>

        {{-- Share or Footer --}}
        <div class="mt-16 pt-8 border-t border-gray-200">
            <p class="text-sm text-gray-400 italic mb-4">Bagikan berita ini:</p>
            <div class="flex flex-wrap gap-4">
                {{-- Instagram Story (Uses Web Share API) --}}
                <button onclick="shareToSocial('instagram')" class="flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:text-pink-600 hover:border-pink-600 transition-all shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    <span class="text-sm font-medium">Instagram Story</span>
                </button>

                {{-- WhatsApp --}}
                <a href="https://wa.me/?text={{ urlencode($berita->title . ' - ' . url()->current()) }}" target="_blank" class="flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:text-green-600 hover:border-green-600 transition-all shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-14.7 8.38 8.38 0 0 1 3.8.9L21 3z"/></svg>
                    <span class="text-sm font-medium">WhatsApp</span>
                </a>

                {{-- Twitter/X --}}
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:text-blue-400 hover:border-blue-400 transition-all shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                    <span class="text-sm font-medium">Twitter</span>
                </a>

                {{-- Copy Link --}}
                <button onclick="copyToClipboard()" id="copyBtn" class="flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:text-primary hover:border-primary transition-all shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    <span class="text-sm font-medium">Salin Tautan</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>
<script>
    function shareToSocial(platform) {
        const shareData = {
            title: '{{ $berita->title }}',
            text: 'Baca berita terbaru dari BEM KBM POLINES: {{ $berita->title }}',
            url: window.location.href
        };

        if (navigator.share) {
            navigator.share(shareData)
                .then(() => console.log('Berhasil membagikan'))
                .catch((error) => console.log('Gagal membagikan', error));
        } else {
            // Fallback for desktop or unsupported browsers
            if (platform === 'instagram') {
                alert('Untuk membagikan ke Instagram Story, silakan salin tautan dan tempel di Instagram Anda (Fitur Story langsung hanya tersedia di perangkat seluler).');
            }
        }
    }

    function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            const btn = document.getElementById('copyBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check text-green-500"><polyline points="20 6 9 17 4 12"/></svg>
                <span class="text-sm font-medium text-green-500">Tersalin!</span>
            `;
            setTimeout(() => {
                btn.innerHTML = originalText;
            }, 2000);
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        gsap.registerPlugin(ScrollTrigger);

        const navbar = document.querySelector("nav");
        if (navbar) {
            gsap.set(navbar, { position: "absolute", top: "1.5rem", y: 0 });
            ScrollTrigger.create({
                start: 100,
                onEnter: () => gsap.to(navbar, { position: "fixed", top: "1rem", duration: 0.3, ease: "power2.out" }),
                onLeaveBack: () => gsap.to(navbar, { position: "absolute", top: "1.5rem", duration: 0.3, ease: "power2.out" })
            });
        }
    });
</script>

@endsection
