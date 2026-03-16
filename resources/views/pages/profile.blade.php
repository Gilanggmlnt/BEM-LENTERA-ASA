@extends('layouts.app')
@section('title', 'Profil')
@section('content')

{{-- FONT & NAVBAR STICKY STYLE --}}
<style>
@font-face {
    font-family: 'Tempting';
    src: url('/fonts/Tempting.woff2') format('woff2'),
         url('/fonts/Tempting.woff') format('woff');
}
.font-tempting { font-family: 'Tempting', cursive; }

/* STICKY NAVBAR */
nav.is-sticky {
    position: fixed;
    top: 1.5rem; /* Corresponds to top-6 */
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

<div class="w-full min-h-screen bg-[#F9F9F9] text-dark">
    {{-- TENTANG BEM --}}
    <section id="tentang-bem" class="pt-48 pb-32 px-4 sm:px-8 max-w-7xl mx-auto mb-32 overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-16 mb-20 items-center">
            <div id="tentang-logo" class="md:col-span-1 flex justify-center">
                <img src="{{ asset('images/logobemkbmpolines.png') }}" alt="Logo BEM KBM Polines" class="w-48 h-auto md:w-full md:h-auto">
            </div>
            <div id="tentang-teks" class="md:col-span-2 text-left">
                <div class="inline-block px-4 py-1 bg-dark text-white rounded-full text-xs tracking-wider mb-6">
                    PROFIL
                </div>
                <h1 class="text-3xl md:text-5xl font-normal leading-tight mb-8">
                    Tentang BEM KBM Polines
                </h1>
                <div class="text-dark-light leading-relaxed text-lg space-y-4">
                    <p>
                        <span class="font-bold">Badan Eksekutif Mahasiswa Keluarga Besar Mahasiswa Politeknik Negeri Semarang (BEM KBM POLINES)</span> merupakan lembaga eksekutif mahasiswa yang berperan sebagai wadah aspirasi, penggerak perubahan, serta mitra strategis civitas akademika.
                    </p>
                    <p>
                        BEM hadir sebagai jembatan komunikasi antara mahasiswa dengan pihak kampus, sekaligus sebagai motor penggerak  dalam pengembangan potensi, kepemimpinan, dan karakter mahasiswa.
                    </p>
                    <p>
                        Melalui Kabinet Lentera Asa, BEM KBM POLINES hadir dengan semangat baru untuk menerangi setiap aspirasi, memperkuat kolaborasi, serta menggerakkan peran mahasiswa dalam menciptakan lingkungan kampus yang progresif, inklusif, dan berdaya saing. Kabinet ini berkomitmen untuk menjadi ruang tumbuh bersama bagi seluruh mahasiswa dalam mewujudkan perubahan yang berkelanjutan.
                    </p>
                    
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                            {{-- Card Total Fungsionaris --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center">
                        <p class="text-dark-light text-lg">Fungsionaris</p>
                    <div class="text-3xl font-bold mb-2">144</div>
                    </div>
                            {{-- Card Total Program Kerja --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center">
                        <p class="text-dark-light text-lg">Program Kerja</p>
                        <div class="text-3xl font-bold mb-2">{{ $totalProker }}</div>
                    </div>
                            {{-- Card Periode --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center">
                        <p class="text-dark-light text-lg">Periode</p>
                    <div class="text-3xl font-bold mb-2">{{ $periode }}</div>
                </div>
                            {{-- Card Total Kementerian --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center">
                        <p class="text-dark-light text-lg">Kementerian</p>
                    <div class="text-3xl font-bold mb-2">{{ $totalKementerian }}</div>
                </div>
            </div>
    </section>

    {{-- VISI & MISI --}}
    <section id="visi-misi" class="py-32 px-4 sm:px-8 bg-gradient-to-br from-[#1E1E1E] via-[#2A2A2A] to-[#4D4D4D] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div id="visi-misi-title" class="flex items-center gap-3 mb-12 opacity-0">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold">
                    Visi & Misi
                </h2>
                <span class="text-[#FFC900] text-3xl">↗</span>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div id="visi-card" class="opacity-0 translate-x-[-30px] bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 sm:p-8 shadow-lg">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FFC900] to-[#FFDD00] flex items-center justify-center text-black">
                            <i data-lucide="eye" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold">Visi</h3>
                    </div>
                    <p class="text-white-200 leading-relaxed">
                        “BEM KBM POLINES YANG <span class="text-[#FFC900] font-semibold">PROAKTIF, SOLUTIF, DAN INKLUSIF </span>DEMI MENUJU POLINES YANG UNGGUL.”
                    </p>
                </div>
                <div id="misi-card" class="opacity-0 translate-x-[30px] bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 sm:p-8 shadow-lg">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FFC900] to-[#FFDD00] flex items-center justify-center text-black">
                            <i data-lucide="target" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold">Misi</h3>
                    </div>
                    <ul class="space-y-4">
                        @php
                            $misiList = [
                                "Mengoptimalkan tata kelola internal BEM KBM POLINES yang berlandaskan profesionalisme dan loyalitas",
                                "Merealisasikan hubungan baik dan kolaboratif dengan seluruh elemen KBM Polines ",
                                "Memaksimalkan peran dalam pengembangan potensi dan ide-ide kreatif mahasiswa",
                                "Mengakomodasi pelayanan terhadap mahasiswa secara inklusif dan solutif",
                                "Merangkul mahasiswa dalam berkontribusi dan memberikan dampak positif terhadap masyarakat"
                            ];
                        @endphp
                        @foreach ($misiList as $index => $misi)
                            <li class="misi-item opacity-0 translate-x-[20px] flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-[#FFC900] text-black flex items-center justify-center text-xs font-bold flex-shrink-0">
                                    {{ $index + 1 }}
                                </span>
                                <span class="text-white-200 text-sm leading-relaxed">
                                    {{ $misi }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- STRUKTUR KABINET --}}
    <section class="py-24 overflow-x-auto bg-slate-50" id="struktur-kabinet">
        <div class="max-w-7xl mx-auto">
            <div id="struktur-kabinet-title" class="flex items-center gap-3 mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold">
                    Struktur Kabinet
                </h2>
                <span class=" text-4xl">↗</span>
            </div>
        <div class="min-w-[2400px] flex flex-col items-center font-sans pb-40">

            <style>
            .line-v { background-color: #000; width: 2px; position: absolute; }
            .line-h { background-color: #000; height: 2px; position: absolute; }
            .z-line { z-index: 10; }
            .z-box { z-index: 20; }
            
            /* Wrapper agar garis dan box selalu sinkron */
            .node-wrapper {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            </style>

            <div class="flex flex-col items-center relative z-box">
            <div class="relative bg-white border-2 border-yellow-400 rounded-lg px-8 py-3 font-bold text-base text-center shadow-md min-w-[220px]">
                Presiden Mahasiswa
            </div>
            
            <div class="h-12 w-[2px] bg-black relative z-line"></div>
            
            <div class="relative bg-white border-2 border-yellow-400 rounded-lg px-8 py-3 font-bold text-base text-center shadow-md min-w-[220px]">
                Wakil Presiden Mahasiswa
            </div>
            </div>


            <div class="relative w-full flex justify-center">
            
            <div class="line-v h-[340px] left-1/2 -translate-x-1/2 top-0 z-line"></div>

            <div class="absolute left-1/2 top-14 w-[600px] h-auto z-line">
                
                <div class="line-h w-[280px] top-0 left-0"></div>
                <div class="line-v h-10 top-0 left-[278px]"></div>

                <div class="absolute top-10 left-[168px] w-[220px] flex flex-col items-center">
                    
                    <div class="relative bg-white border-2 border-yellow-400 rounded-lg px-8 py-3 font-bold text-base text-center shadow-md min-w-[220px] z-box">
                    Sekretaris Kabinet
                    </div>
                    <div class="h-12 w-[2px] bg-black relative z-line"></div>
                    

                    <div class="absolute top-[60px] w-[500px] flex justify-center gap-4">
                    <div class="line-h top-0 left-[15.9%] right-[15.9%] z-line"></div>

                    <div class="flex-1 flex flex-col items-center relative">
                        <div class="line-v h-4 top-0 z-line"></div>
                        <a href="{{ route('kementerian.show', ['slug' => 'kesekretariatan']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center min-w-[140px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Kesekretariatan
                        </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                        <div class="line-v h-4 top-0 z-line"></div>
                        <a href="{{ route('kementerian.show', ['slug' => 'keuangan']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center min-w-[140px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Keuangan
                        </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                        <div class="line-v h-4 top-0 z-line"></div>
                        <a href="{{ route('kementerian.show', ['slug' => 'komunikasi-dan-informasi']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center min-w-[140px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Kominfo
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="h-[340px] w-full"></div>


            <div class="w-full px-10 relative z-box">
            
            <div class="line-h top-0 left-[12.7%] right-[12.7%] z-line"></div>

            <div class="grid grid-cols-4 w-full gap-16">

                <div class="node-wrapper">
                <div class="line-v h-16 top-0 z-line"></div>
                
                <div class="relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box">
                    Menko Internal
                </div>
                <div class="h-4 w-[2px] bg-black relative z-line"></div>
                
                

                <div class="line-v h-6 relative z-line"></div> 

                <div class="flex justify-center relative w-full">
                    <div class="line-h top-0 left-[16.8%] right-[16.8%] z-line"></div>
                    
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'dalam-negeri']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center min-w-[130px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Dalam Negeri
                    </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'psdm']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center min-w-[130px] mt-4 z-box hover:shadow-lg transition-shadow">
                        PSDM
                    </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'agama']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center min-w-[130px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Agama
                    </a>
                    </div>
                </div>
                </div>

                <div class="node-wrapper">
                <div class="line-v h-16 top-0 z-line"></div>
                
                <div class="relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box">
                    Menko Kemahasiswaan
                </div>

                <div class="h-4 w-[2px] bg-black relative z-line"></div>

                <div class="line-v h-6 relative z-line"></div>

                <div class="flex gap-2 justify-center relative w-full">
                    <div class="line-h top-0 left-[12.2%] right-[12.2%] z-line"></div>

                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'advokasi-dan-kesejahteraan-mahasiswa']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-2 py-2 text-sm font-semibold text-center w-full mx-1 mt-4 z-box hover:shadow-lg transition-shadow">
                        Advokesma
                    </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'minat-dan-bakat']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-2 py-2 text-sm font-semibold text-center w-full mx-1 mt-4 z-box hover:shadow-lg transition-shadow">
                        Minat & Bakat
                    </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'riset-dan-keilmuan']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-2 py-2 text-sm font-semibold text-center w-full mx-1 mt-4 z-box hover:shadow-lg transition-shadow">
                        Riset & Keilmuan
                    </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'ekonomi-kreatif']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-2 py-2 text-sm font-semibold text-center w-full mx-1 mt-4 z-box hover:shadow-lg transition-shadow">
                        Ekonomi Kreatif
                    </a>
                    </div>
                </div>
                </div>

                <div class="node-wrapper">
                
                <div class="line-v h-16 top-0 z-line"></div>
                
                <div class="relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box">
                    Menko Kemasyarakatan
                </div>
                <div class="h-4 w-[2px] bg-black relative z-line"></div>

                <div class="line-v h-6 relative z-line"></div>

                <div class="flex justify-center relative w-full">
                    <div class="line-h top-0 left-[25%] right-[25%] z-line"></div>

                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'lingkungan-hidup']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-0 py-2 text-sm font-semibold text-center w-full max-w-[200px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Lingkungan Hidup
                    </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'sosial-masyarakat']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center w-full max-w-[150px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Sosial Masyarakat
                    </a>
                    </div>
                </div>
                </div>

                <div class="node-wrapper">
                <div class="line-v h-16 top-0 z-line"></div>
                
                <div class="relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box">
                    Menko Relasi dan Pergerakan
                </div>
                <div class="h-4 w-[2px] bg-black relative z-line"></div>

                <div class="line-v h-6 relative z-line"></div>

                <div class="flex justify-center relative w-full">
                    <div class="line-h top-0 left-[25%] right-[25%] z-line"></div>

                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'sosial-politik']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center w-full max-w-[150px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Sosial Politik
                    </a>
                    </div>
                    <div class="flex-1 flex flex-col items-center relative">
                    <div class="line-v h-4 top-0 z-line"></div>
                    <a href="{{ route('kementerian.show', ['slug' => 'luar-negeri']) }}" class="relative bg-yellow-300 border border-yellow-500 rounded-md px-4 py-2 text-sm font-semibold text-center w-full max-w-[150px] mt-4 z-box hover:shadow-lg transition-shadow">
                        Luar Negeri
                    </a>
                    </div>
                </div>
                </div>

            </div>
            </div>

        </div>
        </section>




{{-- SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        gsap.registerPlugin(ScrollTrigger);

        // 1. Animasi Navbar
        const navbar = document.querySelector("nav");
        if (navbar) {
            gsap.set(navbar, { position: "absolute", top: "1.5rem", y: 0 });
            ScrollTrigger.create({
                start: 100,
                onEnter: () => gsap.to(navbar, { position: "fixed", top: "1rem", y: 0, duration: 0.3, ease: "power2.out" }),
                onLeaveBack: () => gsap.to(navbar, { position: "absolute", top: "2.5rem", y: 0, duration: 0.3, ease: "power2.out" })
            });
        }

        // 2. Animasi Tentang BEM
        gsap.fromTo("#tentang-logo", { opacity: 0, x: -50 }, {
            scrollTrigger: { trigger: "#tentang-bem", start: "top 80%" },
            opacity: 1, x: 0, duration: 1, ease: "power3.out"
        });
        gsap.fromTo("#tentang-teks", { opacity: 0, x: 50 }, {
            scrollTrigger: { trigger: "#tentang-bem", start: "top 80%" },
            opacity: 1, x: 0, duration: 1, ease: "power3.out"
        });

        // 3. Animasi Visi Misi
        const visiMisiTl = gsap.timeline({
            scrollTrigger: {
                trigger: "#visi-misi",
                start: "top 85%",
                toggleActions: "play none none reverse"
            }
        });
        visiMisiTl.to("#visi-misi-title", { opacity: 1, y: 0, duration: 0.6, ease: "power2.out" });
        visiMisiTl.to("#visi-card", { opacity: 1, x: 0, duration: 0.6, ease: "power2.out" }, "-=0.3");
        visiMisiTl.to("#misi-card", { opacity: 1, x: 0, duration: 0.6, ease: "power2.out" }, "-=0.4");
        gsap.to(".misi-item", {
            scrollTrigger: { trigger: "#misi-card", start: "top 85%" },
            opacity: 1, x: 0, duration: 0.4, stagger: 0.12, ease: "power2.out"
        });

        // 4. Animasi Struktur Kabinet
        gsap.from(".struktur-level", {
            scrollTrigger: {
                trigger: "#struktur-kabinet",
                start: "top 80%",
            },
            opacity: 0,
            y: 50,
            duration: 0.8,
            stagger: 0.2
        });
    });
</script>

@endsection
