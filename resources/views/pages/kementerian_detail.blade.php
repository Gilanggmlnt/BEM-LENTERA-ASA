@extends('layouts.app')
@section('title', $kementerian->nama_kementerian)
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
    <div class="pt-32 pb-12"> {{-- Increased padding top for absolute navbar --}}
        <div class="container-main mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Back Button --}}
            <div class="mb-8">
                <a href="{{ url('/profile#struktur-kabinet') }}" class="inline-flex items-center gap-2 text-muted-foreground hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                    <span>Kembali ke Struktur Kabinet</span>
                </a>
            </div>

            {{-- Header --}}
            <div class="bg-dark rounded-2xl p-8 mb-8 text-white">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    @php
                        $imageFilename = $slug . '.png'; 
                        $logoImagePath = 'images/logo_kementerian/' . $imageFilename;

                        $igHandles = [
                            'kesekretariatan' => 'ksknkeu.bempolines',
                            'keuangan' => 'ksknkeu.bempolines',
                            'komunikasi-dan-informasi' => 'kominfo.bempollines',
                            'dalam-negeri' => 'kemendagri.bempolines',
                            'psdm' => 'psdm_bempolines',
                            'agama' => 'kemenag.bempolines',
                            'advokasi-dan-kesejahteraan-mahasiswa' => 'kesma.bempolines',
                            'minat-dan-bakat' => 'minbak.bempolines',
                            'riset-dan-keilmuan' => 'riskel.bempolines',
                            'ekonomi-kreatif' => 'ekraf.bempolines',
                            'sosial-masyarakat' => 'sosmas.bempolines',
                            'lingkungan-hidup' => 'lh.bempolines',
                            'sosial-politik' => 'sospol.bempolines',
                            'luar-negeri' => 'lugri.bempolines',
                        ];
                        $currentIg = $igHandles[$slug] ?? null;
                    @endphp
                    <div class="w-24 h-24 bg-white p-2 rounded-2xl flex items-center justify-center text-5xl font-bold text-dark overflow-hidden">
                        @if(file_exists(public_path($logoImagePath)))
                            <img src="{{ asset($logoImagePath) }}" alt="{{ $kementerian->nama_kementerian }} Logo" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-yellow flex items-center justify-center">
                                @php
                                    $words = explode(' ', str_replace(['Kementerian ', 'dan', 'Pergerakan', 'Kesejahteraan', 'Mahasiswa', 'Sumber Daya'], '', $kementerian->nama_kementerian));
                                    $acronym = '';
                                    foreach ($words as $word) {
                                        if (!empty($word)) {
                                            $acronym .= strtoupper(substr($word, 0, 1));
                                        }
                                    }
                                    if (empty($acronym) && !empty($kementerian->nama_kementerian)) {
                                        $acronym = strtoupper(substr($kementerian->nama_kementerian, 0, 2));
                                    }
                                @endphp
                                {{ $acronym }}
                            </div>
                        @endif
                    </div>
                    <div class="text-center md:text-left flex-1">
                        @if($minister)
                            <p class="text-primary text-sm mb-1">Kementerian</p>
                            <h1 class="text-3xl font-bold mb-2">
                                {{ $kementerian->nama_kementerian }}
                            </h1>
                            <p class="text-white/80">
                                Badan Eksekutif Mahasiswa Politeknik Negeri Semarang Kabinet Lentera Asa
                            </p>
                        @else
                            <h1 class="text-3xl font-bold mb-2">
                                {{ $kementerian->nama_kementerian }}
                            </h1>
                            <p class="text-white/60 text-sm italic">
                                Menteri belum ditunjuk atau data tidak tersedia.
                            </p>
                        @endif

                        @if($currentIg)
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 mt-4">
                            <a href="https://instagram.com/{{ $currentIg }}" target="_blank" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full border border-white/10 transition-all group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram text-primary group-hover:scale-110 transition-transform"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                <span class="text-sm font-medium">@ {{ $currentIg }}</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Description --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6 mb-8">
                <div class="flex items-center gap-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right text-primary"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                    <h2 class="text-xl font-bold text-dark">Tentang Kementerian</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">{{ $description }}</p>
            </div>

            {{-- Members Section --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6 mb-8">
                <div class="flex items-center gap-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users text-primary"><path d="M9 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/><path d="M17 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/><path d="M1 21v-1a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1"/><path d="M13 21v-1a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1"/></svg>
                    <h2 class="text-xl font-bold text-dark">
                        Anggota Kementerian ({{ $members->count() }} Orang)
                    </h2>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @forelse($members as $member)
                    @php
                        $hasPhoto = $member->photo_path && file_exists(public_path('images/foto_fungsionaris/' . $member->photo_path));
                        $photoUrl = $hasPhoto ? asset('images/foto_fungsionaris/' . $member->photo_path) : '';
                    @endphp
                    <div class="member-card cursor-pointer bg-gray-50 border border-gray-200 rounded-lg p-3 text-center hover:shadow-md transition-all hover:-translate-y-1"
                         data-name="{{ $member->nama_fungsionaris }}"
                         data-role="{{ $member->jabatan->nama_jabatan }}"
                         data-ministry="{{ $kementerian->nama_kementerian }}"
                         data-photo="{{ $photoUrl }}">
                        <div class="w-16 h-16 rounded-full mx-auto mb-2 overflow-hidden border-2 border-primary/30 bg-white">
                            @if($hasPhoto)
                                <img
                                    src="{{ $photoUrl }}"
                                    alt="{{ $member->nama_fungsionaris }}"
                                    class="w-full h-full object-cover"
                                />
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                            @endif
                        </div>
                        <h4 class="font-semibold text-dark text-sm truncate">{{ $member->nama_fungsionaris }}</h4>
                        <p class="text-xs text-primary">{{ $member->jabatan->nama_jabatan }}</p>
                    </div>
                    @empty
                    <p class="col-span-full text-center text-gray-500">Tidak ada anggota ditemukan untuk kementerian ini.</p>
                    @endforelse
                </div>
            </div>

            {{-- MEMBER MODAL --}}
            <div id="memberModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
                <div class="absolute inset-0 bg-dark/80 backdrop-blur-sm" onclick="closeMemberModal()"></div>
                <div class="bg-white rounded-3xl overflow-hidden max-w-sm w-full shadow-2xl relative animate-in fade-in zoom-in duration-300">
                    <button onclick="closeMemberModal()" class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-dark transition-all">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                    <div class="p-8 text-center">
                        <div class="w-64 h-80 rounded-xl mx-auto mb-6 overflow-hidden border-4 border-primary/20 bg-gray-50">
                            <img id="modalMemberPhoto" src="" alt="" class="w-full h-full object-cover">
                            <div id="modalMemberPhotoPlaceholder" class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400 hidden">
                                <i data-lucide="user" class="w-12 h-12"></i>
                            </div>
                        </div>
                        <h3 id="modalMemberName" class="text-xl font-bold text-dark mb-1"></h3>
                        <p id="modalMemberRole" class="text-primary font-semibold text-sm mb-4"></p>
                        <div class="pt-4 border-t border-gray-100">
                            <p class="text-xs text-gray-400 uppercase tracking-widest mb-1">Kementerian</p>
                            <p id="modalMemberMinistry" class="text-gray-600 text-sm font-medium"></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Programs Section --}}
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="flex items-center gap-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-target text-primary"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    <h2 class="text-xl font-bold text-dark">Agenda & Program Kerja</h2>
                </div>
                <div class="grid sm:grid-cols-2 gap-4">
                    {{-- Display Prokers --}}
                    @foreach($kementerian->prokers->unique('nama_proker') as $program)
                    @php
                        $prokerUrl = $program->slug ? route('proker.show', $program->slug) : '#';
                    @endphp
                    <a href="{{ $prokerUrl }}" class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:border-primary/50 hover:shadow-md transition-all group">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-primary mb-1 block">Program Kerja</span>
                                <h4 class="font-semibold text-dark group-hover:text-primary transition-colors">{{ $program->nama_proker }}</h4>
                            </div>
                            <span class="text-xs bg-primary/20 text-primary px-2 py-1 rounded-full whitespace-nowrap ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar inline w-3 h-3 mr-1"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                                {{ \Carbon\Carbon::parse($program->tanggal_pelaksanaan)->format('d M Y') }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 line-clamp-3">{{ $program->deskripsi_proker }}</p>
                        <div class="mt-4 flex justify-end">
                            <span class="text-xs font-bold text-primary flex items-center gap-1 {{ $program->slug ? 'opacity-0 group-hover:opacity-100' : 'opacity-30' }} transition-opacity">
                                {{ $program->slug ? 'Lihat Detail' : 'Detail Belum Tersedia' }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </span>
                        </div>
                    </a>
                    @endforeach

                    {{-- Display Agendas --}}
                    @foreach($kementerian->agendas as $agenda)
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:border-primary/50 hover:shadow-md transition-all group">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-blue-600 mb-1 block">Agenda</span>
                                <h4 class="font-semibold text-dark">{{ $agenda->nama_agenda }}</h4>
                            </div>
                            <span class="text-xs bg-primary/20 text-primary px-2 py-1 rounded-full whitespace-nowrap ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar inline w-3 h-3 mr-1"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                                {{ $agenda->pelaksanaan_agenda }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 line-clamp-3">{{ $agenda->deskripsi_agenda }}</p>
                    </div>
                    @endforeach

                    @if($kementerian->prokers->isEmpty() && $kementerian->agendas->isEmpty())
                    <p class="col-span-full text-center text-gray-500">Tidak ada agenda atau program kerja ditemukan untuk kementerian ini.</p>
                    @endif
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
            // Posisi awal navbar (top-10 ≈ 2.5rem)
            gsap.set(navbar, {
                position: "absolute",
                top: "1.5rem",
                y: 0
            });

            ScrollTrigger.create({
                start: 100, // aktif setelah scroll 100px
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

        // Member Modal Logic
        const memberModal = document.getElementById('memberModal');
        const memberCards = document.querySelectorAll('.member-card');
        
        memberCards.forEach(card => {
            card.addEventListener('click', () => {
                const name = card.getAttribute('data-name');
                const role = card.getAttribute('data-role');
                const ministry = card.getAttribute('data-ministry');
                const photo = card.getAttribute('data-photo');

                document.getElementById('modalMemberName').textContent = name;
                document.getElementById('modalMemberRole').textContent = role;
                document.getElementById('modalMemberMinistry').textContent = ministry;
                
                const photoImg = document.getElementById('modalMemberPhoto');
                const photoPlaceholder = document.getElementById('modalMemberPhotoPlaceholder');
                
                if (photo) {
                    photoImg.src = photo;
                    photoImg.alt = name;
                    photoImg.classList.remove('hidden');
                    photoPlaceholder.classList.add('hidden');
                } else {
                    photoImg.classList.add('hidden');
                    photoPlaceholder.classList.remove('hidden');
                }

                memberModal.classList.remove('hidden');
                memberModal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            });
        });

        window.closeMemberModal = function() {
            memberModal.classList.add('hidden');
            memberModal.classList.remove('flex');
            document.body.style.overflow = '';
        };
    });
</script>

@endsection
