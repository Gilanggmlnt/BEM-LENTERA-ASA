<nav id="navbar" class="absolute left-0 w-full z-50 px-4 transition-all duration-300">
    <div
        class="max-w-7xl mx-auto flex items-center justify-between
        bg-gradient-to-r from-dark to-dark-light
        rounded-full px-6 py-3 shadow-lg border-2 border-primary
        transition-transform duration-300 hover:-translate-y-1">

        {{-- Logo --}}
        <div class="flex items-center gap-4 text-white">
            <img src="{{ asset('images/logolensa.png') }}"
                     alt="Lentera"
                     class="w-8 h-10 object-contain">
            <span class="font-normal text-xs sm:text-sm leading-tight">
                Kabinet<br>Lentera Asa
            </span>
        </div>

        {{-- Desktop Menu --}}
        <div class="hidden md:flex items-center gap-8 text-sm text-gray-200">
            <a href="{{ url('/') }}#hero" 
               data-section="hero"
               class="nav-link hover:text-primary transition-colors {{ request()->is('/') ? 'text-primary font-medium' : '' }}">Beranda</a>
            
            <a href="{{ url('/') }}#kalender" 
               data-section="kalender"
               class="nav-link hover:text-primary transition-colors">Linimasa Kalender</a>
            
            <a href="{{ url('/profile') }}" 
               class="nav-link hover:text-primary transition-colors {{ request()->is('profile') ? 'text-primary font-medium' : '' }}">Profil</a>
            
            <a href="{{ url('/') }}#saluran" 
               data-section="saluran"
               class="nav-link hover:text-primary transition-colors">Saluran</a>

            <a href="{{ route('berita.index') }}" 
               class="nav-link hover:text-primary transition-colors {{ request()->is('berita*') ? 'text-primary font-medium' : '' }}">Berita</a>
        </div>

        {{-- Narahubung Dropdown --}}
        <div class="relative group hidden md:block">
            <button class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full font-bold text-sm bg-gradient-to-r from-primary to-secondary text-dark shadow-md hover:shadow-primary/20 transition-all">
                Narahubung
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform group-hover:rotate-180"><path d="m6 9 6 6 6-6"/></svg>
            </button>
            
            {{-- Dropdown Menu --}}
            <div class="absolute right-0 mt-2 w-72 bg-white rounded-2xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                <div class="p-4 space-y-3">
                    {{-- Contact Adinda --}}
                    <a href="https://wa.me/6289644026033" target="_blank" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group/item text-left">
                        <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center text-green-600 group-hover/item:bg-green-600 group-hover/item:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.74 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l2.18-2.18a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Umum & Medpart</p>
                            <p class="text-sm font-bold text-dark leading-tight">Adinda</p>
                        </div>
                    </a>

                    {{-- Contact Naufal --}}
                    <a href="https://wa.me/6285718681668" target="_blank" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group/item text-left">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 group-hover/item:bg-blue-600 group-hover/item:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Sponsorship</p>
                            <p class="text-sm font-bold text-dark leading-tight">Naufal Shidqi</p>
                        </div>
                    </a>

                    {{-- Email --}}
                    <a href="mailto:bemkbm@polines.ac.id" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group/item text-left">
                        <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary group-hover/item:bg-primary group-hover/item:text-dark transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Email Resmi</p>
                            <p class="text-sm font-bold text-dark leading-tight">bemkbm@polines.ac.id</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Mobile Toggle --}}
        <button id="mobile-menu-button" class="md:hidden text-white p-2 focus:outline-none">
            <i data-lucide="menu" id="menu-icon" class="w-6 h-6"></i>
            <i data-lucide="x" id="close-icon" class="w-6 h-6 hidden"></i>
        </button>
    </div>

    {{-- Mobile Menu Overlay --}}
    <div id="mobile-menu" 
         class="hidden md:hidden absolute top-full left-4 right-4 mt-3 
                bg-gradient-to-b from-dark to-dark-light 
                border-2 border-primary rounded-3xl p-6 shadow-2xl 
                transition-all duration-300 opacity-0 -translate-y-4">
        <div class="flex flex-col gap-4 text-gray-200">
            <a href="{{ url('/') }}#hero" data-section="hero" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Beranda</a>
            <a href="{{ url('/') }}#kalender" data-section="kalender" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Linimasa Kalender</a>
            <a href="{{ url('/profile') }}" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Profil</a>
            <a href="{{ url('/') }}#saluran" data-section="saluran" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Saluran</a>
            <a href="{{ route('berita.index') }}" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors {{ request()->is('berita*') ? 'text-primary font-medium' : '' }}">Berita</a>
            
            <div class="pt-2">
                <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-3">Narahubung</p>
                <div class="space-y-3">
                    <a href="https://wa.me/6289644026033" target="_blank" class="flex items-center gap-3 text-white/70">
                        <div class="w-8 h-8 rounded-lg bg-green-600/20 flex items-center justify-center text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.74 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l2.18-2.18a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <span class="text-sm">Adinda (Umum & Medpart)</span>
                    </a>
                    <a href="https://wa.me/6285718681668" target="_blank" class="flex items-center gap-3 text-white/70">
                        <div class="w-8 h-8 rounded-lg bg-blue-600/20 flex items-center justify-center text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <span class="text-sm">Naufal Shidqi (Sponsorship)</span>
                    </a>
                    <a href="mailto:bemkbm@polines.ac.id" class="flex items-center gap-3 text-white/70">
                        <div class="w-8 h-8 rounded-lg bg-primary/20 flex items-center justify-center text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </div>
                        <span class="text-sm text-xs">bemkbm@polines.ac.id</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        const mobileLinks = document.querySelectorAll('.mobile-link');
        const navLinks = document.querySelectorAll('.nav-link');

        // --- 1. Fungsi Scroll ke ID dengan Offset ---
        function scrollToId(id) {
            const el = document.getElementById(id);
            if (el) {
                const offset = 80; // Sesuaikan dengan tinggi navbar
                const bodyRect = document.body.getBoundingClientRect().top;
                const elementRect = el.getBoundingClientRect().top;
                const elementPosition = elementRect - bodyRect;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        }

        // --- 2. Handle Klik Menu ---
        function handleNavClick(e) {
            const href = this.getAttribute('href');
            if (href.includes('#') && window.location.pathname === '/') {
                const id = href.split('#')[1];
                e.preventDefault();
                scrollToId(id);
                if (!mobileMenu.classList.contains('hidden')) toggleMenu();
            }
        }

        navLinks.forEach(link => link.addEventListener('click', handleNavClick));
        mobileLinks.forEach(link => link.addEventListener('click', handleNavClick));

        // --- 3. LOGIKA KRUCIAL: Handle Hash saat pindah halaman ---
        if (window.location.hash && window.location.pathname === '/') {
            // Sembunyikan scroll sementara agar tidak terlihat "lompat" kasar
            window.scrollTo(0, 0); 
            
            // Tunggu seluruh resource (termasuk GSAP) selesai dimuat
            window.addEventListener('load', function() {
                setTimeout(() => {
                    const id = window.location.hash.substring(1);
                    scrollToId(id);
                }, 500); // Jeda 500ms untuk memastikan tinggi halaman stabil
            });
        }

        // --- 4. Indikator Aktif (Scroll Spy) ---
        function updateActiveLink() {
            if (window.location.pathname !== '/') return;
            const scrollPos = window.scrollY + 200;
            const sections = ['hero', 'kalender', 'saluran', 'berita'];
            let currentSection = 'hero';

            sections.forEach(id => {
                const el = document.getElementById(id);
                if (el && scrollPos >= el.offsetTop) {
                    currentSection = id;
                }
            });

            navLinks.forEach(link => {
                const sec = link.getAttribute('data-section');
                if (sec) {
                    if (sec === currentSection) {
                        link.classList.add('text-primary', 'font-medium');
                        link.classList.remove('text-gray-200');
                    } else {
                        link.classList.remove('text-primary', 'font-medium');
                        link.classList.add('text-gray-200');
                    }
                }
            });
        }

        window.addEventListener('scroll', updateActiveLink);
        updateActiveLink();

        // --- 5. Mobile Menu Toggle ---
        function toggleMenu() {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.classList.remove('opacity-0', '-translate-y-4');
                    mobileMenu.classList.add('opacity-100', 'translate-y-0');
                }, 10);
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.classList.remove('opacity-100', 'translate-y-0');
                mobileMenu.classList.add('opacity-0', '-translate-y-4');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', toggleMenu);
        }

        // --- 6. GSAP STICKY NAVBAR ---
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
            const navbar = document.getElementById("navbar");
            if (navbar) {
                gsap.set(navbar, { position: "absolute", top: "1.5rem", y: 0 });
                ScrollTrigger.create({
                    start: 100,
                    onEnter: () => gsap.to(navbar, { position: "fixed", top: "1rem", duration: 0.3, ease: "power2.out" }),
                    onLeaveBack: () => gsap.to(navbar, { position: "absolute", top: "1.5rem", duration: 0.3, ease: "power2.out" })
                });
            }
        }
    });
</script>
