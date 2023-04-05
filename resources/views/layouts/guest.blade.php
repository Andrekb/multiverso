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
        
        <link rel="stylesheet" href="{{url('/build/assets/reset-3cd4965f.css')}}" />
        <link rel="stylesheet" href="{{url('/build/assets/akb-b1523e1d.css')}}" />
        <link rel="stylesheet" href="{{url('/build/assets/login-527029ce.css')}}" />
        <link rel="stylesheet" href="{{url('/build/assets/admin-7d8b67a8.css')}}" />
        <script type="module" src="{{url('/build/assets/app-5ba92f12.js')}}"></script>
    </head>
    <body>
        <div class="generalize flex-column flex-center fullheight">
            <a href="/">
                <x-application-logo class="logo-center fill-gray" />
            </a>
            {{ $slot }}
        </div>
    </body>
</html>
