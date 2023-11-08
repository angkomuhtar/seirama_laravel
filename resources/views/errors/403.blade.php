<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href={{ asset('images/logo.png') }}>
    <title>Seirama - BBPP Batangkaluku</title>
    {{-- Scripts --}}
    @vite(['resources/css/app.scss', 'resources/js/custom/store.js'])
</head>

<body>

    <div class="bg-slate-100 dark:bg-slate-900">
        <div class="min-h-screen flex flex-col justify-center items-center text-center py-20">
            <img src="{{ asset('/images/403.svg') }}" alt="image" />
            <div class="max-w-[546px] mx-auto w-full mt-12">
                <h4 class="text-slate-900 mb-4 font-Inter text-3xl leading-9 font-semibold">{{ __('Access Denied') }}
                </h4>
                <div class="text-slate-600 dark:text-slate-300 text-base font-normal mb-8">
                    {{ __('You don\'t have permission to view this page.') }}
                </div>
            </div>
            <div class="max-w-[300px] mx-auto w-full">
                <a href="{{ route('home') }}" class="defaultButton">
                    {{ __('Go To Homepage') }}
                </a>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
