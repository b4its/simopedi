<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMOPEDI</title>
    {{-- TAILWIND CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- LEAFTLET CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: "Inter", sans-serif;
        }
    </style>

    {{-- ALPINEJS --}}
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>

<body>
    <x-navbar>
    </x-navbar>

    {{-- CONTENNT --}}
    {{ $slot }}

    {{-- CHARTJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@1.27.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@2.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@2"></script>
    {{-- LEAFLET --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- BOOTSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    {{-- CHARTJS-PLUGIN-STREAMING --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@1.27.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-streaming@2.0.0"></script>
    <!-- Spotlight JS -->
    <script src="https://cdn.jsdelivr.net/gh/cttricks/spotlight.js/dist/spotlight.min.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/gh/cttricks/spotlight.js/dist/spotlight.min.js" type="module" lights-on></script>
    {{ $script ?? '' }}

    <x-footer></x-footer>
</body>

</html>
