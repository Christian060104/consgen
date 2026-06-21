<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
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
    <body class="font-sans text-slate-900 bg-slate-100 antialiased transition-colors duration-200 dark:bg-slate-950 dark:text-slate-100">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.16),_transparent_20%),linear-gradient(180deg,_#f8fafc_0%,_#e2e8f0_40%,_#f8fafc_100%)] dark:bg-[radial-gradient(circle_at_top,_rgba(59,130,246,0.18),_transparent_22%),linear-gradient(180deg,_#020617_0%,_#111827_40%,_#111827_100%)]">
            @include('layouts.navigation')

            @isset($header)
                <header class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <div class="rounded-[2rem] bg-white/90 border border-slate-200 shadow-xl shadow-slate-900/5 backdrop-blur-xl dark:bg-slate-950/90 dark:border-slate-800">
                        <div class="px-6 py-8">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-12">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
