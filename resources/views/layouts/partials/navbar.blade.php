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
            <a href="{{ url('/') }}" class="hover:text-primary transition-colors {{ request()->is('/') ? 'text-primary font-medium' : '' }}">Beranda</a>
            <a href="{{ url('/#kalender') }}" class="hover:text-primary transition-colors">Linimasa Kalender</a>
            <a href="{{ url('/profile') }}" class="hover:text-primary transition-colors {{ request()->is('profile') ? 'text-primary font-medium' : '' }}">Profil</a>
            <a href="{{ url('/#berita') }}" class="hover:text-primary transition-colors">Berita</a>
        </div>

        {{-- Button --}}
        <a href="#"
           class="hidden md:inline-flex items-center gap-2
                  px-5 py-2 rounded-full font-semibold text-sm
                  bg-gradient-to-r from-primary to-secondary
                  text-dark hover:scale-105 transition">
            Narahubung
        </a>

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
            <a href="{{ url('/') }}" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Beranda</a>
            <a href="{{ url('/#kalender') }}" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Linimasa Kalender</a>
            <a href="{{ url('/profile') }}" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Profil</a>
            <a href="{{ url('/#berita') }}" class="mobile-link py-2 border-b border-gray-700/50 hover:text-primary transition-colors">Berita</a>
            <a href="#" class="mobile-link mt-2 inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full font-bold text-sm bg-gradient-to-r from-primary to-secondary text-dark">
                Narahubung
            </a>
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

        function toggleMenu() {
            const isHidden = mobileMenu.classList.contains('hidden');
            
            if (isHidden) {
                // Open
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.classList.remove('opacity-0', '-translate-y-4');
                    mobileMenu.classList.add('opacity-100', 'translate-y-0');
                }, 10);
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                // Close
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

        // Close menu when clicking on a link
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (!mobileMenu.classList.contains('hidden')) {
                    toggleMenu();
                }
            });
        });
    });
</script>
