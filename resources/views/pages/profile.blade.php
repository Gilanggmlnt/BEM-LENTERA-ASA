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
    {{-- WELCOME SECTION --}}
    <section id="hero" class="relative w-full h-[75vh] md:h-[90vh] flex items-center justify-center overflow-hidden">

        <!-- Background -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/PEN01709.JPG.jpeg') }}" 
                class="w-full h-full object-cover object-center" />
            
            <!-- Elegant overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 text-center px-6 max-w-4xl">

            <!-- Subtitle -->
            <p id="hero-subtitle" 
            class="text-[#FFC900] text-xs md:text-sm tracking-[0.4em] uppercase mb-10 opacity-0 inline-block backdrop-blur-md bg-white/5 border border-white/10 px-4 py-1 rounded-2xl">
                Selamat Datang di BEM KBM Polines
            </p>

            <!-- Title -->
            <h1 id="hero-title" 
                class="text-white text-4xl md:text-6xl lg:text-7xl leading-tight font-light mb-4 opacity-0">

                <span class="block">
                    <span class="font-tempting text-5xl md:text-7xl lg:text-8xl">K</span>abinet
                </span>

                <span class="block mt-1">
                    <span class="font-tempting text-5xl md:text-7xl lg:text-8xl">L</span>entera
                    <span class="font-tempting text-5xl md:text-7xl lg:text-8xl ml-2">A</span>sa
                </span>
            </h1>

            <!-- Glass Card (modern touch) -->
            <div class="inline-block backdrop-blur-md bg-white/5 border border-white/10 px-4 py-1 rounded-2xl opacity-0" id="hero-period">
                <p class="text-white text-lg md:text-xl font-medium tracking-wide">
                    2025 / 2026
                </p>
            </div>

            <!-- Quote -->
            <p id="hero-quote" 
            class="text-[#FFC900]/90 italic text-sm md:text-base mt-6 mb-2 opacity-0">
                “Nyalakan Lentera, Menyulam Asa”
            </p>

            <!-- Divider -->
            <div id="hero-line" 
                class="w-16 h-[2px] bg-gradient-to-r from-transparent via-[#FFC900] to-transparent mx-auto opacity-0">
            </div>

        </div>
    </section>

    {{-- TENTANG BEM --}}
    <section id="tentang-bem" class="py-32 px-4 sm:px-8 max-w-7xl mx-auto mb-32 overflow-hidden">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-10">
                            {{-- Card Total Fungsionaris --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center text-center">
                        <div class="text-3xl font-bold mb-2">{{ $totalFungsionaris }}</div>
                        <p class="text-dark-light text-lg">Fungsionaris</p>
                    </div>
                            {{-- Card Total Staff Muda --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center text-center">
                        <div class="text-3xl font-bold mb-2">{{ $totalStaffMuda }}</div>
                        <p class="text-dark-light text-lg">Staff Muda</p>
                </div>
                            {{-- Card Total Program Kerja --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center text-center">
                        <div class="text-3xl font-bold mb-2">{{ $totalProker }}</div>
                        <p class="text-dark-light text-lg">Program Kerja</p>
                    </div>
                            {{-- Card Total Agenda --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center text-center">
                        <div class="text-3xl font-bold mb-2">{{ $totalAgenda }}</div>
                        <p class="text-dark-light text-lg">Agenda</p>
                    </div>
                            {{-- Card Total Kementerian --}}
                    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center justify-center text-center">
                        <div class="text-3xl font-bold mb-2">{{ $totalKementerian }}</div>
                        <p class="text-dark-light text-lg">Kementerian</p>
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
            <div id="struktur-kabinet-title" class="flex items-center gap-3 p-4 mb-2">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold">
                    Struktur Kabinet
                </h2>
                <span class=" text-4xl">↗</span>
            </div>
            <div class="mt-2 w-fit mx-auto inline-flex items-center gap-2 bg-gray/10 px-4 py-2 rounded-full text-xs md:text-sm font-medium border border-primary/20">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            <span>Klik pada kementerian untuk melihat detail anggota dan program kerja</span>
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
            @php $presma = $leaders['presiden-mahasiswa'] ?? null; @endphp
            <div 
                class="leader-node relative bg-white border-2 border-yellow-400 rounded-lg px-8 py-3 font-bold text-base text-center shadow-md min-w-[220px] cursor-pointer hover:bg-yellow-50 transition-colors"
                data-name="{{ $presma->nama_fungsionaris ?? 'Kevin Kurnia Priambodo' }}"
                data-role="Presiden Mahasiswa"
                data-photo="{{ asset('images/' . ($presma->photo_path ?? 'Foto_Presma_Kevin.png')) }}"
                data-desc="Memimpin dan mengarahkan jalannya roda organisasi BEM KBM Polines serta menjadi representasi utama mahasiswa di tingkat internal maupun eksternal."
            >
                Presiden Mahasiswa
            </div>
            
            <div class="h-12 w-[2px] bg-black relative z-line"></div>
            
            @php $wapresma = $leaders['wakil-presiden-mahasiswa'] ?? null; @endphp
            <div 
                class="leader-node relative bg-white border-2 border-yellow-400 rounded-lg px-8 py-3 font-bold text-base text-center shadow-md min-w-[220px] cursor-pointer hover:bg-yellow-50 transition-colors"
                data-name="{{ $wapresma->nama_fungsionaris ?? 'Anggara Yudha Pratama' }}"
                data-role="Wakil Presiden Mahasiswa"
                data-photo="{{ asset('images/' . ($wapresma->photo_path ?? 'Foto_Wapresma_Anggara.png')) }}"
                data-desc="Mendampingi Presiden Mahasiswa dalam mengawasi kinerja kabinet serta memastikan koordinasi antar elemen organisasi berjalan dengan harmonis."
            >
                Wakil Presiden Mahasiswa
            </div>
            </div>


            <div class="relative w-full flex justify-center">
            
            <div class="line-v h-[340px] left-1/2 -translate-x-1/2 top-0 z-line"></div>

            <div class="absolute left-1/2 top-14 w-[600px] h-auto z-line">
                
                <div class="line-h w-[280px] top-0 left-0"></div>
                <div class="line-v h-10 top-0 left-[278px]"></div>

                <div class="absolute top-10 left-[168px] w-[220px] flex flex-col items-center">
                    
                    @php $sekab = $leaders['sekretaris-kabinet'] ?? null; @endphp
                    <div 
                        class="leader-node relative bg-white border-2 border-yellow-400 rounded-lg px-8 py-3 font-bold text-base text-center shadow-md min-w-[220px] z-box cursor-pointer hover:bg-yellow-50 transition-colors"
                        data-name="{{ $sekab->nama_fungsionaris ?? 'Fazila Banyulangit P.' }}"
                        data-role="Sekretaris Kabinet"
                        data-photo="{{ asset('images/' . ($sekab->photo_path ?? 'Foto_SekretarisKabinet_Fazila.png')) }}"
                        data-desc="Bertanggung jawab atas tata kelola administrasi pusat dan sinkronisasi agenda strategis antar kementerian di bawah naungannya."
                        data-oversight="Kesekretariatan, Keuangan, Komunikasi dan Informasi"
                    >
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
                
                @php $menkoInternal = $leaders['menteri-koordinator-internal'] ?? null; @endphp
                <div 
                    class="leader-node relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box cursor-pointer hover:bg-yellow-50 transition-colors"
                    data-name="{{ $menkoInternal->nama_fungsionaris ?? 'Muhammad Hammam Shidqi' }}"
                    data-role="Menteri Koordinator Internal"
                    data-photo="{{ asset('images/' . ($menkoInternal->photo_path ?? 'Foto_MenkoInternal_Muhammad.png')) }}"
                    data-desc="Mengkoordinasikan kementerian yang berfokus pada penguatan internal organisasi dan pengembangan sumber daya mahasiswa."
                    data-oversight="Dalam Negeri, PSDM, Agama"
                >
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
                
                @php $menkoMhs = $leaders['menteri-koordinator-kemahasiswaan'] ?? null; @endphp
                <div 
                    class="leader-node relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box cursor-pointer hover:bg-yellow-50 transition-colors"
                    data-name="{{ $menkoMhs->nama_fungsionaris ?? 'Aditya Rizal Pramudya' }}"
                    data-role="Menteri Koordinator Kemahasiswaan"
                    data-photo="{{ asset('images/' . ($menkoMhs->photo_path ?? 'Foto_MenkoKemahasiswaan_Aditya.png')) }}"
                    data-desc="Mengkoordinasikan kementerian yang bergerak di bidang pelayanan minat, bakat, riset, dan kesejahteraan seluruh mahasiswa."
                    data-oversight="Advokesma, Minat & Bakat, Riset & Keilmuan, Ekonomi Kreatif"
                >
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
                
                @php $menkoMasy = $leaders['menteri-koordinator-kemasyarakatan'] ?? null; @endphp
                <div 
                    class="leader-node relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box cursor-pointer hover:bg-yellow-50 transition-colors"
                    data-name="{{ $menkoMasy->nama_fungsionaris ?? 'Auliya Putra' }}"
                    data-role="Menteri Koordinator Kemasyarakatan"
                    data-photo="{{ asset('images/' . ($menkoMasy->photo_path ?? 'Foto_MenkoKemasyarakatan_Auliya.png')) }}"
                    data-desc="Mengkoordinasikan kementerian yang berfokus pada pengabdian masyarakat dan pelestarian lingkungan hidup."
                    data-oversight="Lingkungan Hidup, Sosial Masyarakat"
                >
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
                
                @php $menkoRelasi = $leaders['menteri-koordinator-relasi-dan-pergerakan'] ?? null; @endphp
                <div 
                    class="leader-node relative bg-white border-2 border-yellow-400 rounded-lg px-6 py-3 font-bold text-base text-center shadow-md min-w-[200px] mt-16 z-box cursor-pointer hover:bg-yellow-50 transition-colors"
                    data-name="{{ $menkoRelasi->nama_fungsionaris ?? 'Revanza Dhimas Erudita' }}"
                    data-role="Menteri Koordinator Relasi dan Pergerakan"
                    data-photo="{{ asset('images/' . ($menkoRelasi->photo_path ?? 'Foto_MenkoRelasidanPegerakan_Revanza.png')) }}"
                    data-desc="Mengkoordinasikan kementerian yang bergerak di bidang kajian sosial politik dan hubungan luar negeri organisasi."
                    data-oversight="Sosial Politik, Luar Negeri"
                >
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

    {{-- MODAL DETAIL PEMIMPIN --}}
    <div id="leaderModal" class="fixed inset-0 z-[100] hidden">
        {{-- Overlay --}}
        <div class="absolute inset-0 bg-dark/80 backdrop-blur-sm"></div>
        
        {{-- Modal Content --}}
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl overflow-hidden max-w-2xl w-full shadow-2xl relative animate-in fade-in zoom-in duration-300">
                {{-- Close Button --}}
                <button onclick="closeLeaderModal()" class="absolute top-6 right-6 z-10 w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 backdrop-blur-md flex items-center justify-center text-dark transition-all">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>

                <div class="flex flex-col md:flex-row">
                    {{-- Photo Section --}}
                    <div class="md:w-2/5 h-64 md:h-auto bg-gray-100 relative">
                        <img id="modalPhoto" src="" alt="" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark/60 to-transparent md:hidden"></div>
                    </div>

                    {{-- Info Section --}}
                    <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">
                        <div class="mb-6">
                            <span id="modalRole" class="text-xs font-bold text-primary uppercase tracking-widest bg-primary/10 px-3 py-1 rounded-full mb-2 inline-block"></span>
                            <h3 id="modalName" class="text-2xl md:text-3xl font-bold text-dark leading-tight"></h3>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Deskripsi</h4>
                                <p id="modalDesc" class="text-gray-600 text-sm leading-relaxed"></p>
                            </div>

                            <div id="oversightContainer" class="hidden">
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Menaungi Kementerian</h4>
                                <p id="modalOversight" class="text-primary text-sm font-semibold"></p>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <img src="{{ asset('images/logobemkbmpolines.png') }}" alt="Logo BEM" class="h-8 opacity-20">
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

        // 0. Hero Section Animation
        gsap.set("#hero-subtitle", { opacity: 0, y: 30 });
        gsap.set("#hero-title", { opacity: 0, y: 30 });
        gsap.set("#hero-period", { opacity: 0, y: 20 });
        gsap.set("#hero-quote", { opacity: 0, y: 20 });
        gsap.set("#hero-line", { opacity: 0, width: 0 });

        const heroTl = gsap.timeline({ defaults: { ease: "power3.out" } });
        heroTl.to("#hero-subtitle", { opacity: 1, y: 0, duration: 1, delay: 0.5 })
              .to("#hero-title", { opacity: 1, y: 0, duration: 1 }, "-=0.7")
              .to("#hero-period", { opacity: 1, y: 0, duration: 0.8 }, "-=0.6")
              .to("#hero-quote", { opacity: 1, y: 0, duration: 0.8 }, "-=0.6")
              .to("#hero-line", { opacity: 1, width: "80px", duration: 0.8 }, "-=0.4");

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

        // 5. Modal Detail Pemimpin
        const modal = document.getElementById('leaderModal');
        const nodes = document.querySelectorAll('.leader-node');
        
        nodes.forEach(node => {
            node.addEventListener('click', () => {
                const name = node.getAttribute('data-name');
                const role = node.getAttribute('data-role');
                const photo = node.getAttribute('data-photo');
                const desc = node.getAttribute('data-desc');
                const oversight = node.getAttribute('data-oversight');

                document.getElementById('modalName').textContent = name;
                document.getElementById('modalRole').textContent = role;
                document.getElementById('modalPhoto').src = photo;
                document.getElementById('modalPhoto').alt = name;
                document.getElementById('modalDesc').textContent = desc;

                const oversightContainer = document.getElementById('oversightContainer');
                if (oversight) {
                    document.getElementById('modalOversight').textContent = oversight;
                    oversightContainer.classList.remove('hidden');
                } else {
                    oversightContainer.classList.add('hidden');
                }

                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        });

        window.closeLeaderModal = function() {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        };

        // Close on backdrop click
        modal.addEventListener('click', (e) => {
            if (e.target === modal || e.target.classList.contains('bg-dark/80')) {
                closeLeaderModal();
            }
        });
    });
</script>

    {{-- ================= FORM KRITIK & SARAN ================= --}}
    <section id="aspirasi" class="py-24 bg-white">
        <div class="container mx-auto px-4 md:px-8 lg:px-16">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Suara Mahasiswa</h2>
                    <p class="text-gray-500">Punya kritik, saran, atau aspirasi untuk BEM KBM Polines? Sampaikan di sini secara anonim maupun terbuka.</p>
                </div>

                @if(session('success'))
                    <div class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl flex items-center gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-8 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl flex items-center gap-3">
                        <i data-lucide="alert-circle" class="w-5 h-5"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('aspirasi.store') }}" method="POST" class="bg-[#F9F9F9] p-8 md:p-12 rounded-[2rem] border border-gray-100 shadow-sm">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-dark ml-1">Nama Pengirim (Opsional)</label>
                            <input type="text" name="nama_pengirim" placeholder="Masukkan nama atau kosongkan untuk anonim" 
                                class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-dark ml-1">Email (Opsional)</label>
                            <input type="email" name="email_pengirim" placeholder="email@contoh.com" 
                                class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none">
                        </div>
                    </div>

                    <div class="space-y-2 mb-6">
                        <label class="text-sm font-semibold text-dark ml-1">Kategori</label>
                        <select name="kategori" required 
                            class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none appearance-none bg-white">
                            <option value="Kritik">Kritik</option>
                            <option value="Saran">Saran</option>
                            <option value="Aspirasi">Aspirasi Umum</option>
                        </select>
                    </div>

                    <div class="space-y-2 mb-8">
                        <label class="text-sm font-semibold text-dark ml-1">Pesan Aspirasi</label>
                        <textarea name="pesan" rows="5" required placeholder="Tuliskan kritik, saran, atau aspirasi Anda di sini..." 
                            class="w-full px-6 py-4 rounded-2xl border border-gray-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-dark text-white hover:bg-primary hover:text-dark font-bold py-5 rounded-2xl transition-all duration-300 flex items-center justify-center gap-3 group">
                        Kirim Aspirasi
                        <i data-lucide="send" class="w-5 h-5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

