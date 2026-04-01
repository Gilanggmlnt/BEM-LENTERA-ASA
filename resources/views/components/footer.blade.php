<footer class="bg-dark text-white pt-16 pb-8 border-t border-white/5">
    <div class="container mx-auto px-4 md:px-8 lg:px-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            
            <!-- Kolom 1: Profil BEM -->
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logobemkbmpolines.png') }}" alt="Logo BEM KBM Polines" class="h-16 w-auto drop-shadow-md">
                    <div>
                        <h3 class="font-bold text-xl leading-tight uppercase tracking-wider">BEM KBM<br><span class="text-primary">POLINES</span></h3>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed text-justify">
                    Badan Eksekutif Mahasiswa Keluarga Besar Mahasiswa Politeknik Negeri Semarang adalah lembaga tinggi kemahasiswaan yang menaungi seluruh mahasiswa Polines dengan semangat kolaborasi dan inovasi.
                </p>
                <div class="flex gap-4">
                    <a href="https://instagram.com/bem_polines" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary hover:text-dark transition-all duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram group-hover:scale-110"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                    </a>
                    <a href="https://tiktok.com/@bem_polines" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary hover:text-dark transition-all duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-music-2 group-hover:scale-110"><circle cx="8" cy="18" r="4"/><path d="M12 18V2l7 4"/></svg>
                    </a>
                    <a href="mailto:bemkbm@polines.ac.id" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary hover:text-dark transition-all duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail group-hover:scale-110"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Kolom 2: Navigasi Cepat -->
            <div>
                <h4 class="text-lg font-bold mb-8 relative inline-block">
                    Navigasi Cepat
                    <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-primary rounded-full"></span>
                </h4>
                <ul class="space-y-4 text-gray-400">
                    <li><a href="{{ route('beranda') }}" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>Beranda</a></li>
                    <li><a href="{{ route('profile') }}" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>Profil Kabinet</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>Berita & Kabar</a></li>
                    <li><a href="{{ route('beranda') }}#proker-calendar" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>Linimasa Kalender</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Layanan -->
            <div>
                <h4 class="text-lg font-bold mb-8 relative inline-block">
                    Layanan & Saluran
                    <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-primary rounded-full"></span>
                </h4>
                <ul class="space-y-4 text-gray-400">
                    <li><a href="{{ route('profile') }}#aspirasi" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>Kritik dan Saran</a></li>
                    <li><a href="https://whatsapp.com/channel/0029VayYLfKEAKWJTrZ6vn0q" target="_blank" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>BEM POLINES</a></li>
                    <li><a href="https://whatsapp.com/channel/0029Vajovk95Ui2bXYB9ET16" target="_blank" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>INFO LOMBA & BEASISWA</a></li>
                    <li><a href="https://whatsapp.com/channel/0029VbB8SPvFcow3KJz3kW2C" target="_blank" class="hover:text-primary transition-colors flex items-center gap-2 group"><span class="w-1 h-1 bg-primary rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></span>KEMENDAGRI</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Hubungi Kami -->
            <div>
                <h4 class="text-lg font-bold mb-8 relative inline-block">
                    Hubungi Kami
                    <span class="absolute -bottom-2 left-0 w-1/2 h-1 bg-primary rounded-full"></span>
                </h4>
                <div class="space-y-5">
                    <div class="flex items-start gap-4 group">
                        <div class="w-10 h-10 shrink-0 rounded-lg bg-white/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-dark transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div class="text-sm text-gray-400 leading-relaxed">
                            <span class="block text-white font-medium mb-1">Gedung PKM, Polines</span>
                            Jl. Prof. H. Soedarto, SH Tembalang Jawa Tengah 50275, Indonesia
                        </div>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 shrink-0 rounded-lg bg-white/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-dark transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-plus"><path d="M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/><path d="M19 16v6"/><path d="M16 19h6"/></svg>
                        </div>
                        <div class="text-sm text-gray-400">
                            <span class="block text-white font-medium mb-1">Email Resmi</span>
                            bemkbm@polines.ac.id
                        </div>
                    </div>
                    <div class="flex items-center gap-4 group">
                        <div class="w-10 h-10 shrink-0 rounded-lg bg-white/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-dark transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div class="text-sm text-gray-400">
                            <span class="block text-white font-medium mb-1">Contact Person</span>
                            089644026033
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-white/5 mb-8">

        <!-- Copyright & Credits -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-sm text-gray-500">
            <div class="text-center md:text-left">
                <p>&copy; {{ date('Y') }} <span class="text-white font-medium">BEM KBM POLINES</span>. All Right Reserved.</p>
                <p class="mt-1">Dikelola penuh Dedikasi oleh <span class="text-primary hover:underline cursor-pointer">Kementerian Komunikasi dan Informasi</span></p>
            </div>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-primary transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-primary transition-colors">Syarat & Ketentuan</a>
                <div class="h-4 w-[1px] bg-white/10 hidden md:block"></div>
                <p class="hidden md:block italic text-xs">"Nyalakan Lentera, Menyulam Asa"</p>
            </div>
        </div>
    </div>
</footer>
