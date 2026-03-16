<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BEM POLINES</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- Vite Scripts --}}
        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/Index.jsx'])
    </head>
    <body class="antialiased">
        {{-- 
            Target root untuk aplikasi React.
            Data dari Laravel ($nodes & $edges) dikonversi ke JSON dan disisipkan di sini.
        --}}
        <div id="root" data-nodes="{{ json_encode($nodes) }}" data-edges="{{ json_encode($edges) }}"></div>
    </body>
</html>