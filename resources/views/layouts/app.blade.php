<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-secondary">
    <header class="p-5 text-center text-white bg-primary mb-5">
        <h1 class="text-orange">The Rick and Morty</h1>
    </header>

    <main class="container-lg">
        {{$slot}}
    </main>
    <header class="p-5 text-center text-white bg-primary mt-5">
        <h5>Autor: José Gpe Reséndiz Reséndiz</h5>
    </header>
</body>

@livewireScripts
</body>
</html>
