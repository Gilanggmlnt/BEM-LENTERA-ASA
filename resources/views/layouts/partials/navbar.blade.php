<nav class="absolute left-0 w-full z-50 px-4"> {{-- Removed top-0 --}}
    <div
        class="max-w-7xl mx-auto flex items-center justify-between
        bg-gradient-to-r from-dark to-dark-light
        rounded-full px-6 py-3 shadow-lg border-2 border-primary
        transition-transform duration-300 hover:-translate-y-1">

        {{-- Logo --}}
        <div class="flex items-center gap-4 text-white">
            <img src="{{ asset('images/logolensa.png') }}"
                     alt="Lentera"
                     class="mx-auto w-5.8 h-10">
            <span class="font-normal text-sm leading-tight">
                Kabinet<br>Lentera Asa
            </span>
        </div>

        {{-- Menu --}}
        <div class="hidden md:flex items-center gap-8 text-sm text-gray-200">
            <a href="{{ url('/') }}" class="hover:text-primary {{ request()->is('/') ? 'text-primary font-normal' : '' }}">Beranda</a>
            <a href="{{ url('/#kalender') }}" class="hover:text-primary {{ request()->is('kalender') ? 'text-primary font-normal' : '' }}">Linimasa Kalender</a>
            <a href="{{ url('/profile') }}" class="hover:text-primary {{ request()->is('profile') ? 'text-primary font-normal' : '' }}">Profil</a>
        </div>

        {{-- Button --}}
        <a href="#"
           class="hidden md:inline-flex items-center gap-2
                  px-5 py-2 rounded-full font-semibold text-sm
                  bg-gradient-to-r from-primary to-secondary
                  text-dark hover:scale-105 transition">
            Narahubung
        </a>

        {{-- Mobile --}}
        <button class="md:hidden text-white text-xl">☰</button>
    </div>
</nav>