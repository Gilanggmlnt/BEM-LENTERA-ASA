@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

{{-- FONT --}}
<style>
@font-face {
    font-family: 'Tempting';
    src: url('/fonts/Tempting.woff2') format('woff2'),
         url('/fonts/Tempting.woff') format('woff');
}
.font-tempting { font-family: 'Tempting', cursive; }

.logo-glow {
    filter: drop-shadow(0 0 30px rgba(255, 201, 0, 0.6));
    animation: glow 4s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}
/* GLOW EFFECT */
.logo-glow {
    filter: drop-shadow(0 0 25px rgba(255, 201, 0, 0.55));
}

/* GRID BACKGROUND */
#grid-overlay {
    background-image:
        linear-gradient(rgba(255,255,255,0.08) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.08) 1px, transparent 1px);
    background-size: 80px 80px;
    transform-origin: center;
}

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

/* FLIP CARD STYLES */
.flip-card {
    perspective: 1000px;
    background-color: transparent;
}
.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;
}
.flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
}
.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    border-radius: 1.5rem;
}
.flip-card-back {
    transform: rotateY(180deg);
}


</style>

<div class="w-full min-h-screen bg-[#F9F9F9] text-dark overflow-hidden">

    {{-- ================= HERO ================= --}}
    <section id="hero" class="relative min-h-screen flex items-center justify-center px-4 pt-4">

        {{-- Dekorasi --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-primary opacity-20 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-secondary opacity-20 blur-3xl"></div>

        <div class="relative z-10 text-center max-w-4xl">

            {{-- Logo Lentera --}}
            <div class="mb-12 hero-item">
                <img src="{{ asset('images/logolensa.png') }}"
                     alt="Lentera"
                     class="mx-auto w-20 h-39">
            </div>

            {{-- Title --}}
            <h1 class="hero-item text-4xl sm:text-5xl md:text-6xl font-normal mb-6 tracking-wide leading-tight">
                Badan Eksekutif Mahasiswa
            </h1>


            <h2 class="hero-item text-3xl sm:text-4xl md:text-5xl font-medium tracking-wide mb-6 leading-snug">

                {{-- Kabinet --}}
                <span class="block sm:inline">
                    <span class="font-tempting text-4xl sm:text-5xl md:text-6xl align-middle">K</span>abinet
                </span>

                {{-- Spasi desktop --}}
                <span class="hidden sm:inline mx-2"></span>

                {{-- Lentera Asa --}}
                <span class="block sm:inline mt-2 sm:mt-0">
                    <span class="font-tempting text-4xl sm:text-5xl md:text-6xl align-middle">L</span>entera
                    <span class="mx-1"></span>
                    <span>
                        <span class="font-tempting text-4xl sm:text-5xl md:text-6xl align-middle">A</span>sa
                    </span>
                </span>

            </h2>


        

            <p class="hero-item text-sm sm:text-base text-dark-light mb-8">
                Politeknik Negeri Semarang 2025/2026
            </p>

            {{-- Button --}}
            <div class="hero-item">
                <a href="/profile"
                   class="inline-flex items-center gap-2
                          px-6 py-3 rounded-lg
                          bg-gradient-to-r from-primary to-secondary
                          font-normal shadow-md hover:scale-105 transition">
                    Tentang BEM Polines →
                </a>
            </div>

            {{-- Quote --}}
            <p class="hero-item italic text-xs sm:text-sm text-gray-500 mt-12">
                “Nyalakan Lentera, Menyulam Asa”
            </p>
        </div>
    </section>
</div>

{{-- ================= SAMBUTAN PRESMA ================= --}}
<section id="sambutan" class="relative py-32 px-4 sm:px-8 max-w-7xl mx-auto">
    <div class="grid md:grid-cols-2 gap-16 items-center">

        {{-- Kolom Gambar (Kiri) --}}
        <div class="sambutan-item flex justify-center">
            {{-- Bingkai Modern --}}
            <div class="relative rounded-3xl p-2 bg-gradient-to-br from-primary to-secondary shadow-2xl">
                {{-- Foto --}}
                <div class="bg-white rounded-2xl overflow-hidden relative z-10
                            h-[250px] w-[180px] sm:h-[320px] sm:w-[240px] md:h-[400px] md:w-[300px]
                            hover:scale-105 transition-transform duration-500">
                    <img src="{{ ($presiden && $presiden->photo_path) ? asset('images/foto_fungsionaris/' . $presiden->photo_path) : asset('images/foto_fungsionaris/Foto_Presma_Kevin.png') }}"
                         alt="Presiden Mahasiswa"
                         class="w-full h-full object-cover transition duration-500">

                    {{-- Label Nama --}}
                    <div class="absolute bottom-0 left-0 w-full bg-dark/90 p-4 text-white">
                        @if($presiden)
                        <h4 class="font-medium text-lg">{{ $presiden->nama_fungsionaris }}</h4>
                        <p class="text-xs text-primary">{{ $presiden->jabatan->nama_jabatan }}</p>
                        @else
                        <h4 class="font-medium text-lg">Kevin Kurnia Priambodo</h4>
                        <p class="text-xs text-primary">Presiden Mahasiswa</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Teks (Kanan) --}}
        <div class="sambutan-item text-center md:text-left space-y-8 md:space-y-6">
            <div class="inline-block px-4 py-1 bg-dark text-white rounded-full text-xs tracking-wider">
                SAMBUTAN
            </div>

            <h2 class="text-3xl md:text-5xl font-normal leading-tight">
                Presiden<br>Mahasiswa
            </h2>

            <p class="text-dark leading-relaxed md::text-lg">
                Hidup Mahasiswa! Hidup Rakyat Indonesia! <br>Hidup Perempuan yang Melawan!<br><br>
                Kami hadir membawa Kabinet Lentera Asa sebagai ikhtiar meneguhkan BEM sebagai ruang gerak yang menyalakan kesadaran, harapan, dan keberpihakan. Di tengah dinamika zaman, kami berkomitmen menghadirkan BEM yang inklusif, responsif, dan berdaya guna bagi seluruh mahasiswa Polines.
                <br><br>
                Berangkat dari semangat kolaborasi dan integritas, kami mendorong gerakan yang partisipatif dan transformatif—tidak hanya menjadi suara kritis, tetapi juga menghadirkan solusi nyata. Mari bergerak bersama, menjaga nyala harapan, dan mewujudkan perubahan yang lebih bermakna bagi almamater serta bangsa.
            </p>

            <p class="text-dark leading-relaxed italic border-l-4 border-primary pl-4 md:pl-6 md::text-lg">
                “Nyalakan Lentera, Menyulam Asa“
            </p>

            <div class="flex items-center gap-4 justify-center md:justify-start mt-4">
                @if($presiden)
                <span class="text-dark text-sm md:text-sm">{{ $presiden->nama_fungsionaris }}<br>{{ $presiden->jabatan->nama_jabatan }} BEM KBM Polines 2025/2026</span>
                @else
                <span class="text-dark text-sm md:text-sm">Kevin Kurnia Priambodo<br>Presiden Mahasiswa BEM KBM Polines 2025/2026</span>
                @endif
            </div>        </div>

    </div>
</section>

{{-- ================= FILOSOFI LOGO (TIME TRAVELER) ================= --}}
<section id="filosofi-logo"
    class="relative w-full h-screen bg-gradient-to-r from-dark to-dark text-white overflow-hidden">
    <!-- GRID OVERLAY -->
    <div id="grid-overlay"
        class="pointer-events-none absolute inset-0 z-0 opacity-30">
    </div>

    <h2 id="filosofi-headline"
        class="
            absolute pt-28 sm:pt-32 left-6 sm:left-10
            flex items-center gap-4
            text-2xl sm:text-3xl md:text-4xl
            font-normal
            tracking-wide
            text-white
            z-20
            select-none
        ">
        Filosofi Logo
        <span class="text-2xl sm:text-3xl md:text-4xl">↗</span>
    </h2>



    {{-- Scene Wrapper --}}
    <div id="scene-wrapper" class="relative w-full h-full pt-32 sm:pt-34">

        {{-- ================= SCENE 0 ================= --}}
        <section id="scene-0" class="scene absolute inset-0 flex flex-col items-center justify-center text-center px-6">
            <img src="{{ asset('images/logolensa.png') }}"
                 class="w-48 sm:w-56 md:w-64 logo-glow mb-10">
            <p class="max-w-3xl text-sm sm:text-base text-gray-200 leading-relaxed">
                Logo ini dirancang sebagai representasi visual dari semangat, arah gerak, dan cita-cita Kabinet Lentera Asa
                dalam menjalankan tugas sebagai wadah aspirasi dan penggerak perubahan mahasiswa
                Politeknik Negeri Semarang.
            </p>
        </section>

        {{-- ================= SCENE 1 ================= --}}
        <section id="scene-1" class="scene absolute inset-0 flex flex-col items-center justify-center text-center px-6 opacity-0">
            <img src="{{ asset('images/logofilosofi1.png') }}"
                 class="w-56 mb-10">
            <p class="max-w-3xl text-gray-200 leading-relaxed">
                Dua helai elemen di sisi kanan dan kiri menggambarkan asa (harapan) yang terus tumbuh dan
                membentang ke masa depan. Bentuk menyerupai sayap ini menyimbolkan cita dan angan yang tinggi
                serta kesiapan untuk melambung menghadapi tantangan dengan semangat kolaboratif.
            </p>
        </section>

        {{-- ================= SCENE 2 ================= --}}
        <section id="scene-2" class="scene absolute inset-0 flex flex-col items-center justify-center text-center px-6 opacity-0">
            <img src="{{ asset('images/logofilosofi2.png') }}"
                 class="w-56 mb-10">
            <p class="max-w-3xl text-gray-200 leading-relaxed">
                Bentuk api melambangkan semangat yang menyala, menjadi cahaya harapan dan arah perubahan
                yang dibawa oleh Kabinet Lentera Asa.
            </p>
        </section>

        {{-- ================= SCENE 3 ================= --}}
        <section id="scene-3" class="scene absolute inset-0 flex flex-col items-center justify-center text-center px-6 opacity-0">
            <img src="{{ asset('images/logofilosofi3.png') }}"
                 class="w-56 mb-10">
            <p class="max-w-3xl text-gray-200 leading-relaxed">
                Lima persegi mewakili lima jurusan di Politeknik Negeri Semarang. Tersusun membentuk pola huruf "X"
                sebagai simbol kolaborasi dan sinergi antarjurusan. Warna emas menegaskan peran penting setiap jurusan.
            </p>
        </section>

        {{-- ================= SCENE 4 ================= --}}
        <section id="scene-4" class="scene absolute inset-0 flex flex-col items-center justify-center text-center px-6 opacity-0">
            <img src="{{ asset('images/logofilosofi4.png') }}"
                 class="w-56 mb-10">
            <p class="max-w-3xl text-gray-200 leading-relaxed">
                Tiga elemen di bagian bawah logo menggambarkan Tri Dharma Perguruan Tinggi sebagai landasan utama
                arah gerak dan kontribusi mahasiswa Polines dalam kehidupan akademik dan sosial.
            </p>
        </section>

        <!-- ================= SCENE 5 : LOGO UTUH ================= -->
        <section id="scene-5"
            class="scene absolute inset-0 flex flex-col items-center justify-center text-center px-6 opacity-0 z-10">
            <img src="{{ asset('images/logolensa.png') }}"
                class="w-64 md:w-72 logo-glow mb-10">
            <p class="max-w-3xl text-gray-200 leading-relaxed">
                Keseluruhan elemen logo menyatu sebagai representasi Lentera Asa:
                harapan yang menerangi, semangat yang menyala, dan kolaborasi
                mahasiswa Polines dalam satu arah perjuangan.
            </p>
        </section>
    </div>
</section>

{{-- ================= EVENT ON GOING ================= --}}
<section id="event" class="py-28 px-4 bg-[#F9F9F9]">

    <div class="max-w-7xl mx-auto">

        {{-- Title --}}
        <div class="flex justify-center mb-20">
            <div class="px-10 py-4 rounded-2xl 
                        bg-gradient-to-r from-dark to-dark-light
                        text-white text-2xl md:text-3xl font-medium 
                        flex items-center gap-3 shadow-lg">
                Event On Going <span class="text-2xl">↘</span>
            </div>
        </div>

        {{-- Card Grid --}}
        <div class="grid md:grid-cols-3 gap-10 justtify-center">

            @foreach($upcomingProkers as $proker)
                @php
                    $slugKementerian = Str::slug($proker->kementerian->nama_kementerian);
                    $logoPath = "images/logo_kementerian/{$slugKementerian}.png";
                @endphp
                {{-- Card --}}
                <a href="{{ route('proker.show', $proker->slug) }}" class="bg-white rounded-3xl border border-gray-200 p-6 text-center shadow-sm hover:shadow-xl transition group block relative">

                    {{-- Logo Kementerian --}}
                    <div class="flex justify-center mb-4">
                        <div class="w-14 h-14 p-2 rounded-full bg-white shadow-md flex items-center justify-center -mt-12 overflow-hidden border-2 border-primary/20">
                            @if($proker->kementerian->nama_kementerian == 'BEM KBM POLINES')
                                <img src="{{ asset('images/logolensa.png') }}" class="w-full h-full object-contain">
                            @elseif(file_exists(public_path($logoPath)))
                                <img src="{{ asset($logoPath) }}" class="w-full h-full object-contain">
                            @else
                                <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xs">
                                    {{ strtoupper(substr($proker->kementerian->nama_kementerian, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Flyer/Poster --}}
                    <div class="border-2 border-primary/20 rounded-2xl overflow-hidden mb-5 aspect-[3/4] bg-gray-50 relative group">
                        @if($proker->pamflet && file_exists(public_path($proker->pamflet)))
                            <img src="{{ asset($proker->pamflet) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-primary/40 p-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image mb-2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                <span class="text-xs font-medium uppercase tracking-widest">Segera Hadir</span>
                            </div>
                        @endif
                        
                        {{-- Hover Overlay --}}
                        <div class="absolute inset-0 bg-dark/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="px-4 py-2 bg-primary text-dark font-bold rounded-lg text-xs transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                Lihat Detail
                            </span>
                        </div>
                    </div>

                    <h3 class="text-xl font-bold mb-3 text-dark group-hover:text-primary transition-colors">{{ $proker->nama_proker }}</h3>

                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-3 mb-4">
                        {{ $proker->deskripsi_proker }}
                    </p>

                    <div class="pt-4 border-t border-gray-100 flex items-center justify-center gap-2 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                        <span class="text-xs font-medium">
                            {{ \Carbon\Carbon::parse($proker->tanggal_pelaksanaan)->format('d F Y') }}
                        </span>
                    </div>

                </a>
            @endforeach

            {{-- Placeholder Cards --}}
            @for($i = $upcomingProkers->count(); $i < 3; $i++)
                <div class="bg-white rounded-3xl border border-dashed border-gray-300 p-6 text-center shadow-sm opacity-60 flex flex-col justify-between">
                    <div>
                        {{-- Placeholder Logo --}}
                        <div class="flex justify-center mb-4">
                            <div class="w-14 h-14 rounded-full bg-gray-50 shadow-sm flex items-center justify-center -mt-12 border-2 border-gray-200">
                                <img src="{{ asset('images/logolensa.png') }}" class="w-8 grayscale opacity-30">
                            </div>
                        </div>

                        {{-- Placeholder Poster --}}
                        <div class="border-2 border-gray-100 rounded-2xl overflow-hidden mb-5 aspect-[3/4] bg-gray-50 flex flex-col items-center justify-center text-gray-300 p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles mb-4"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
                            <span class="text-xs font-bold uppercase tracking-widest">Coming Soon</span>
                        </div>

                        <h3 class="text-xl font-bold mb-3 text-gray-300">Program Kerja</h3>

                        <p class="text-sm text-gray-300 leading-relaxed mb-4">
                            Nantikan program kerja menarik lainnya dari BEM KBM Polines.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-gray-50 flex items-center justify-center gap-2 text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hourglass"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>
                        <span class="text-xs font-medium italic">Stay Tuned</span>
                    </div>
                </div>
            @endfor

        </div>
    </div>

</section>

{{-- ================= LINIMASA KALENDER ================= --}}
<section id="kalender" class="py-28 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        {{-- Title --}}
        <div class="flex justify-center mb-16">
            <div class="px-10 py-4 rounded-2xl 
                        bg-gradient-to-r from-dark to-dark-light
                        text-white text-2xl md:text-3xl font-medium 
                        flex items-center gap-3 shadow-lg">
                Linimasa Kalender <span class="text-2xl">↘</span>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-12 items-start">
            {{-- Calendar Column --}}
            <div class="lg:col-span-7 bg-gray-50 rounded-3xl p-8 border border-gray-100 shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <h3 id="currentMonth" class="text-2xl font-bold text-dark">Maret 2026</h3>
                    <div class="flex gap-2">
                        <button onclick="changeMonth(-1)" class="p-2 rounded-xl bg-white border border-gray-200 hover:bg-primary hover:border-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
                        </button>
                        <button onclick="changeMonth(1)" class="p-2 rounded-xl bg-white border border-gray-200 hover:bg-primary hover:border-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-7 gap-4 mb-4">
                    @foreach(['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                        <div class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest">{{ $day }}</div>
                    @endforeach
                </div>

                <div id="calendarGrid" class="grid grid-cols-7 gap-2 sm:gap-4">
                    {{-- Calendar days will be generated by JS --}}
                </div>
            </div>

            {{-- Events Column --}}
            <div class="lg:col-span-5 space-y-6">
                <div class="bg-dark rounded-3xl p-8 text-white min-h-[400px] flex flex-col">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-todo"><path d="m3 16 2 2 4-4"/><path d="m3 6 2 2 4-4"/><path d="M13 6h8"/><path d="M13 12h8"/><path d="M13 18h8"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-lg leading-tight">Detail Kegiatan</h4>
                            <p id="selectedDateText" class="text-xs text-gray-400">Pilih tanggal pada kalender</p>
                        </div>
                    </div>

                    <div id="eventList" class="flex-grow space-y-4">
                        {{-- Events will be listed here --}}
                        <div class="flex flex-col items-center justify-center h-full text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-days mb-4 opacity-20"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                            <p class="text-gray-500 text-sm italic">Klik pada tanggal yang ditandai untuk melihat detail program kerja</p>
                        </div>
                    </div>
                </div>

                {{-- Legend Card --}}
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6">
                    <h5 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Keterangan</h5>
                    <div class="flex items-center gap-4 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-primary ring-4 ring-primary/20"></span>
                            <span>Hari Ini</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-dark ring-4 ring-dark/10"></span>
                            <span>Ada Kegiatan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= SALURAN (CHANNELS) ================= --}}
<section id="saluran" class="py-28 px-4 bg-[#F3F4F6]">
    <div class="max-w-7xl mx-auto">
        {{-- Title --}}
        <div class="text-center mb-16 saluran-header opacity-0">
            <h2 class="text-3xl md:text-5xl font-bold text-dark mb-4">
                Gabung Ke <span class="text-primary">Saluran</span>
            </h2>
            <p class="text-gray-500 max-w-xl mx-auto text-sm md:text-base">
                Dapatkan informasi tercepat dan terpercaya langsung melalui kanal komunikasi resmi kami.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
            @php
                $channels = [
                    [
                        'title' => 'BEM POLINES',
                        'description' => 'Akun Resmi BEM KBM Polines untuk Informasi Terbaru Seputar Kegiatan dan Program Kerja.',
                        'link' => 'https://whatsapp.com/channel/0029VayYLfKEAKWJTrZ6vn0q',
                        'qr' => 'Channel BEM POLINES.png'
                    ],
                    [
                        'title' => 'INFO BEASISWA & LOMBA',
                        'description' => 'Informasi Beasiswa dan Lomba Terbaru untuk Mahasiswa Politeknik Negeri Semarang.',
                        'link' => 'https://whatsapp.com/channel/0029Vajovk95Ui2bXYB9ET16',
                        'qr' => 'CHANNEL INFO BEASISWA & LOMBA.png'
                    ],
                    [
                        'title' => 'KEMENDAGRI',
                        'description' => 'Kanal Informasi terkait Birokrasi Kampus Politeknik Negeri Semarang.',
                        'link' => 'https://whatsapp.com/channel/0029VbB8SPvFcow3KJz3kW2C',
                        'qr' => 'CHANNEL KEMENDAGRI.png'
                    ]
                ];
            @endphp

            @foreach($channels as $index => $channel)
            <div class="flip-card h-80 saluran-card opacity-0 translate-y-8">
                <div class="flip-card-inner">
                    {{-- Front Face --}}
                    <div class="flip-card-front bg-white border border-gray-100 p-8 flex flex-col items-center justify-center shadow-sm">
                        <div class="w-16 h-16 mb-6 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full flex items-center justify-center ring-4 ring-primary/10">
                            <img src="{{ asset('images/whatsapp-seeklogo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="font-bold text-xl text-dark mb-3">{{ $channel['title'] }}</h3>
                        <p class="text-xs text-gray-500 leading-relaxed mb-6">
                            {{ $channel['description'] }}
                        </p>
                        <a href="{{ $channel['link'] }}" 
                           target="_blank"
                           class="bg-gradient-to-r from-primary to-secondary text-dark px-8 py-2.5 rounded-full text-sm font-bold hover:shadow-lg hover:shadow-primary/30 transition-all">
                            Gabung Sekarang
                        </a>
                    </div>

                    {{-- Back Face --}}
                    <div class="flip-card-back bg-dark text-white p-8 flex flex-col items-center justify-center border-2 border-primary">
                        <h3 class="font-bold text-lg mb-6 text-primary">{{ $channel['title'] }}</h3>
                        <div class="w-32 h-32 bg-white rounded-2xl p-2 mb-6 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/qr_saluran/' . $channel['qr']) }}" alt="QR {{ $channel['title'] }}" class="w-full h-full object-contain">
                        </div>
                        <p class="text-[10px] uppercase tracking-widest text-gray-400">Scan atau klik Gabung Sekarang</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= BERITA TERKINI ================= --}}
<section id="berita" class="py-28 px-4 bg-[#F9F9F9]">
    <div class="max-w-7xl mx-auto">
        {{-- Section Header --}}
        <div class="text-center mb-16 news-header opacity-0">
            <h2 class="text-3xl md:text-5xl font-bold text-dark mb-4">
                Berita <span class="text-primary">Terkini</span>
            </h2>
            <p class="text-gray-500 max-w-xl mx-auto text-sm md:text-base">
                Informasi dan berita terbaru seputar kegiatan BEM KBM Politeknik Negeri Semarang
            </p>
        </div>

        @if($newsItems->count() > 0)
        {{-- News Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            {{-- Featured News --}}
            @php $firstNews = $newsItems[0]; @endphp
            <div class="md:col-span-2 news-card opacity-0 translate-y-8">
                <a href="{{ route('berita.show', $firstNews->slug) }}" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all h-full flex flex-col border border-gray-100">
                    <div class="aspect-video relative overflow-hidden">
                        <img src="{{ asset('images/berita/' . $firstNews->image) }}" alt="{{ $firstNews->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-6 left-6">
                            <span class="bg-primary text-dark text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg">
                                {{ $firstNews->category }}
                            </span>
                        </div>
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-gray-400 text-xs mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                            <span>{{ \Carbon\Carbon::parse($firstNews->date)->format('d F Y') }}</span>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-dark mb-4 group-hover:text-primary transition-colors leading-tight">
                            {{ $firstNews->title }}
                        </h3>
                        <p class="text-gray-500 text-sm md:text-base flex-1 mb-6 leading-relaxed line-clamp-3">
                            {{ $firstNews->excerpt ?? Str::limit($firstNews->description, 150) }}
                        </p>
                        <div class="flex items-center gap-2 text-primary font-bold text-sm group-hover:gap-4 transition-all">
                            Baca Selengkapnya 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Side News --}}
            <div class="flex flex-col gap-8">
                @forelse($newsItems->slice(1) as $news)
                <div class="news-card-side opacity-0 translate-y-8">
                    <a href="{{ route('berita.show', $news->slug) }}" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all h-full flex flex-col border border-gray-100">
                        <div class="aspect-[16/9] relative overflow-hidden">
                            <img src="{{ asset('images/berita/' . $news->image) }}" alt="{{ $news->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="bg-primary text-dark text-[8px] font-bold uppercase tracking-widest px-3 py-1 rounded-full shadow-lg">
                                    {{ $news->category }}
                                </span>
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <div class="flex items-center gap-1.5 text-gray-400 text-[10px] mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                                <span>{{ \Carbon\Carbon::parse($news->date)->format('d F Y') }}</span>
                            </div>
                            <h4 class="text-base font-bold text-dark group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                {{ $news->title }}
                            </h4>
                        </div>
                    </a>
                </div>
                @empty
                <div class="bg-white rounded-3xl border border-dashed border-gray-300 p-8 text-center shadow-sm opacity-60 flex flex-col items-center justify-center h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper mb-4 text-gray-300"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
                    <p class="text-gray-400 text-sm font-medium italic">Nantikan berita menarik lainnya</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- See All Button --}}
        <div class="flex justify-center news-header opacity-0">
            <a href="{{ route('berita.index') }}" 
               class="inline-flex items-center gap-3 px-8 py-4 bg-white border border-gray-200 text-dark font-bold rounded-2xl hover:bg-dark hover:text-white hover:border-dark transition-all shadow-sm">
                Lihat Berita Lainnya
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>
        @else
        <div class="bg-white rounded-3xl border border-dashed border-gray-300 p-16 text-center shadow-sm opacity-60">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper mx-auto mb-6 text-gray-300"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/><path d="M18 14h-8"/><path d="M15 18h-5"/><path d="M10 6h8v4h-8V6Z"/></svg>
            <h3 class="text-xl font-bold text-gray-400 mb-2">Belum Ada Berita</h3>
            <p class="text-gray-400">Kami akan segera mengupdate informasi terbaru untuk Anda.</p>
        </div>
        @endif
    </div>
</section>

{{-- ================= SCRIPT ================= --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Lucide Icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        // --- CALENDAR LOGIC ---
        const allProkers = @json($allProkers);
        let calendarDate = new Date();

        function renderCalendar() {
            const year = calendarDate.getFullYear();
            const month = calendarDate.getMonth();
            
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            const monthDisplay = document.getElementById('currentMonth');
            if (monthDisplay) monthDisplay.textContent = `${monthNames[month]} ${year}`;

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            
            const calendarGrid = document.getElementById('calendarGrid');
            if (!calendarGrid) return;
            
            calendarGrid.innerHTML = '';

            // Previous month empty slots
            for (let i = 0; i < firstDay; i++) {
                const empty = document.createElement('div');
                empty.className = 'h-12 sm:h-16';
                calendarGrid.appendChild(empty);
            }

            const today = new Date();
            const todayStr = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;

            for (let day = 1; day <= daysInMonth; day++) {
                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const events = allProkers.filter(p => p.tanggal_pelaksanaan === dateStr);
                const isToday = todayStr === dateStr;
                const hasEvents = events.length > 0;

                const dayBtn = document.createElement('button');
                dayBtn.type = 'button';
                dayBtn.className = `h-12 sm:h-16 rounded-2xl flex flex-col items-center justify-center relative transition-all border-2 font-bold 
                    ${isToday ? 'bg-primary text-dark border-primary ring-2 ring-primary ring-offset-2 z-10' : 
                      hasEvents ? 'bg-dark text-white border-dark hover:bg-dark-light' : 
                      'bg-white text-dark border-transparent hover:border-primary/30'}`;
                
                dayBtn.innerHTML = `<span class="text-sm sm:text-lg">${day}</span>`;
                
                if (hasEvents) {
                    const dot = document.createElement('span');
                    dot.className = `absolute bottom-2 w-1.5 h-1.5 rounded-full ${isToday ? 'bg-dark' : 'bg-primary'}`;
                    dayBtn.appendChild(dot);
                    dayBtn.onclick = () => showEvents(dateStr, events, dayBtn);
                } else {
                    dayBtn.onclick = () => showEmpty(dateStr, dayBtn);
                }

                calendarGrid.appendChild(dayBtn);
            }
        }

        function showEvents(dateStr, events, btn) {
            updateSelection(btn);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('selectedDateText').textContent = new Date(dateStr).toLocaleDateString('id-ID', options);

            const list = document.getElementById('eventList');
            list.innerHTML = '';
            events.forEach(event => {
                list.innerHTML += `
                    <a href="/proker/${event.slug}" class="block group mb-4 last:mb-0">
                        <div class="bg-dark-light/30 border border-white/10 rounded-2xl p-4 hover:bg-dark-light/50 transition-all hover:-translate-y-1">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0 group-hover:bg-primary group-hover:text-dark transition-colors">
                                    <i data-lucide="external-link" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold text-white mb-1 group-hover:text-primary transition-colors">${event.nama_proker}</h5>
                                    <p class="text-xs text-gray-400 mb-2">${event.kementerian.nama_kementerian}</p>
                                    <div class="flex items-center gap-2 text-[10px] text-primary bg-primary/10 px-2 py-1 rounded-full w-fit">
                                        <i data-lucide="user" class="w-3 h-3"></i>
                                        Ketua: ${event.nama_ketuplak}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                `;
            });
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }

        function showEmpty(dateStr, btn) {
            updateSelection(btn);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('selectedDateText').textContent = new Date(dateStr).toLocaleDateString('id-ID', options);
            document.getElementById('eventList').innerHTML = `
                <div class="flex flex-col items-center justify-center h-full text-center py-12 opacity-40">
                    <i data-lucide="coffee" class="w-10 h-10 mb-4"></i>
                    <p class="text-sm italic">Tidak ada agenda. Waktunya istirahat!</p>
                </div>
            `;
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }

        function updateSelection(btn) {
            document.querySelectorAll('#calendarGrid button').forEach(b => {
                if (!b.classList.contains('bg-primary')) {
                    b.classList.remove('ring-2', 'ring-primary', 'ring-offset-2');
                }
            });
            btn.classList.add('ring-2', 'ring-primary', 'ring-offset-2');
        }

        window.changeMonth = function(offset) {
            calendarDate.setMonth(calendarDate.getMonth() + offset);
            renderCalendar();
        };

        renderCalendar();

        // --- NEWS ANIMATIONS ---
        gsap.to(".news-header", {
            scrollTrigger: { trigger: "#berita", start: "top 80%" },
            opacity: 1, y: 0, duration: 1, ease: "power3.out"
        });

        gsap.to(".news-card", {
            scrollTrigger: { trigger: "#berita", start: "top 70%" },
            opacity: 1, y: 0, duration: 1, ease: "power3.out"
        });

        gsap.to(".news-card-side", {
            scrollTrigger: { trigger: "#berita", start: "top 70%" },
            opacity: 1, y: 0, duration: 1, stagger: 0.2, ease: "power3.out"
        });

        // --- SALURAN ANIMATIONS ---
        gsap.to(".saluran-header", {
            scrollTrigger: { trigger: "#saluran", start: "top 80%" },
            opacity: 1, y: 0, duration: 1, ease: "power3.out"
        });

        gsap.to(".saluran-card", {
            scrollTrigger: { trigger: "#saluran", start: "top 70%" },
            opacity: 1, y: 0, duration: 1, stagger: 0.2, ease: "power3.out"
        });

        // --- ANIMATIONS ---
        gsap.from(".hero-item", { opacity: 0, y: 30, duration: 1, stagger: 0.2, ease: "power3.out" });

        gsap.from(".sambutan-item", {
            scrollTrigger: { trigger: "#sambutan", start: "top 90%" },
            opacity: 0, y: 50, duration: 1, stagger: 0.3, ease: "power3.out"
        });

        gsap.to("#grid-overlay", { rotation: 360, duration: 220, repeat: -1, ease: "none" });

        const scenes = ["#scene-0", "#scene-1", "#scene-2", "#scene-3", "#scene-4", "#scene-5"];
        const filosofiTimeline = gsap.timeline({
            scrollTrigger: {
                trigger: "#filosofi-logo", start: "top top", end: "+=5600", scrub: 1.25, pin: true, anticipatePin: 1
            }
        });

        filosofiTimeline.fromTo(scenes[0], { opacity: 1, scale: 1 }, { duration: 1 });
        filosofiTimeline.to({}, { duration: 1 });

        scenes.slice(1).forEach((scene, i) => {
            const prev = scenes[i];
            filosofiTimeline.to(prev, { opacity: 0.4, scale: 1.18, filter: "grayscale(100%)", duration: 0.9 });
            filosofiTimeline.fromTo(scene, { opacity: 0, scale: 0.92 }, { opacity: 1, scale: 1, duration: 1 }, "-=0.5");
            filosofiTimeline.to(prev, { opacity: 0, scale: 1.32, duration: 0.7 }, "-=0.4");
            filosofiTimeline.to({}, { duration: 1.1 });
        });

        gsap.fromTo("#filosofi-headline", { opacity: 0, y: -24 }, {
            opacity: 1, y: 0, duration: 1,
            scrollTrigger: { trigger: "#filosofi-logo", start: "top top+=80", end: "bottom top", scrub: true }
        });
    });
</script>

@endsection
