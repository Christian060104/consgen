<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased bg-slate-100 dark:bg-slate-950">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[radial-gradient(circle_at_top,_rgba(59,130,246,0.16),_transparent_25%),linear-gradient(180deg,_#f8fafc_0%,_#e2e8f0_100%)] dark:bg-[radial-gradient(circle_at_top,_rgba(59,130,246,0.12),_transparent_25%),linear-gradient(180deg,_#020617_0%,_#111827_100%)]">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-slate-800 dark:text-slate-200" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/95 backdrop-blur-xl border border-slate-200 shadow-xl shadow-slate-900/10 dark:bg-slate-900/95 dark:border-slate-800 dark:shadow-slate-950/40 overflow-hidden rounded-[1.75rem]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
