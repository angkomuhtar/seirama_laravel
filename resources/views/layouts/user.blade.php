<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href={{ asset('images/logo.png') }}>
    <title>Seirama - BBPP Batangkaluku</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/wrick17/calendar-plugin@master/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    @vite(['resources/css/app.scss', 'resources/js/custom/store.js'])
</head>



<body class="font-Opensans" id="body_class">
    <div id="">
        <x-user.navbar />
        <main class="relative">
            <div id="loader"
                class="hidden absolute top-0 bottom-0 left-0 right-0 bg-black-500/30 z-[999] flex justify-center items-center overflow-hidden">
                <div class="bg-white rounded-lg">
                    <dotlottie-player src="https://lottie.host/00029ac3-3f38-4777-8d58-d0f9a7ef2355/06ivfntkk5.json"
                        background="transparent" speed="1" style="width: 150px; height: 150px;" loop
                        autoplay></dotlottie-player>
                </div>
            </div>
            {{ $slot }}
        </main>
        <x-user.footer />
    </div>
    @vite(['resources/js/app.js'])
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script type="module">
        $('#burger').change(function(e) {
            console.log('click');
            $('.nav-menu-box').toggleClass('hidden', 500)
            $('.nav-menu-box').toggleClass('grid', 500)
        })
    </script>
    @stack('scripts')
</body>

</html>
