<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auth- CEFA</title>
    <meta name="description" content="Accede al Sistema de Gestión de Semilleros de Investigación - CEFA">

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- SENA Design System fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700|source-sans-pro:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS with SENA configuration -->
    <scrip src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind CSS with SENA configuration -->
    <script src="{{ asset('js/dashboardTailwind.js') }}"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                    </span>
                </a>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
