<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href={{ asset('images/logo.png') }}>
    <title>Seirama - BBPP Batangkaluku</title>

    @vite(['resources/css/app.scss', 'resources/js/custom/store.js'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body class="font-Opensans dashcode-app" id="body_class">
    <div id="">
        <x-user.navbar />
        <main>
            {{ $slot }}
        </main>
        <x-user.footer />
    </div>
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>

</html>
