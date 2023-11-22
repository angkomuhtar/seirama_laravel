<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href={{ asset('images/logo.png') }}>
    <title>Seirama - BBPP Batangkaluku</title>
    @vite(['resources/css/app.scss', 'resources/js/custom/store.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="loginwrapper">
        <div class="lg-inner-column">
            <div class='right-column h-screen relative overflow-y-auto'>
                <div class='inner-content min-h-screen flex flex-col bg-white dark:bg-slate-800'>
                    <div class='auth-box flex flex-col justify-center space-y-5'>
                        <div class='mobile-logo mb-6 self-start'>
                            <a href='/'>
                                <img src="{{ asset('images/logo_hitam.svg') }}" alt='' class='mx-auto' />
                            </a>
                        </div>
                        <div class="flex-1 flex flex-col justify-center">
                            <div class=' 2xl:mb-10 mb-4'>
                                <h3 class='text-slate-500 dark:text-slate-400 text-xs fontop uppercase'>
                                    Selamat datang
                                </h3>
                                <h3 class='font-medium text-lg font-Opensans text-appPrimary-500'>
                                    SEIRAMA BBPP Batangkaluku
                                </h3>
                            </div>
                            {{ $slot }}

                        </div>
                        <div class='auth-footer text-center'>
                            Copyright 2023, BBPP Batangkaluku All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <div class='left-column h-screen bg-cover bg-no-repeat bg-center overflow-hidden'
                style="background-image: url('{{ asset('images/loginBack.png') }}')">
                <div class='flex flex-col h-full justify-center overflow-hidden'>
                    <div class='flex-1 flex flex-col justify-center items-center overflow-hidden'>
                        <a href='/' class='flex justify-center'>
                            <img src='{{ asset('images/logo.png') }}' alt='' class='mb-4 w-3/4' />
                        </a>
                        <h3 class='max-w-[525px] mx-auto py-10 text-center text-appPrimary-500 font-bold'>
                            KEMENTERIAN PERTANIAN
                        </h3>

                        <h3 class='max-w-[525px] mx-auto pb-20 text-center font-semibold text-appPrimary-500 text-3xl'>
                            Balai Besar Pelatihan Pertanian
                            <span class='font-bold'>BATANGKALUKU</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @stack('scripts')

</body>

</html>
