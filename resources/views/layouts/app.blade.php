<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Kabinet Lentera Asa</title>
    
    {{-- Social Media Previews --}}
    @stack('meta')
    
    {{-- Temporary fallback to CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FFC900',
                        secondary: '#FFDD00',
                        dark: '#1E1E1E',
                        'dark-light': '#4D4D4D'
                    },
                    fontFamily: {
                        tempting: ['Tempting', 'serif'],
                        helvetica: ['Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    {{-- Lucide Icons (using jsdelivr UMD build for better compatibility) --}}
    <script src="https://cdn.jsdelivr.net/npm/lucide/dist/umd/lucide.min.js"></script>

    {{-- Local assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F9F9F9] font-helvetica font-normal">
    @include('layouts.partials.navbar')
    @yield('content')

    {{-- Final script initialization --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>