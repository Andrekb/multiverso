<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Fiorde') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;800&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

        
        <!-- Scripts -->
        @vite(['resources/css/reset.css', 'resources/css/akb.css', 'resources/css/admin.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            @include('layouts.navigation')
        </header>

        <!-- Page Heading -->
        @if(isset($header))
            <div class="generalize title-head">
                {{ $header }}
            </div>
        @endif

        <!-- Page Content -->
        <main class="generalize">
            {{ $slot }}
        </main>
    </body>
</html>
