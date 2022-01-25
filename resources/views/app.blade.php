<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        {{-- icon --}}
        {{-- <link rel="icon" href="favicon.png" type="image/png"> --}}
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- @while (Route::is('home'))
        <link rel="stylesheet" href="{{ mix('css/event.css') }}">
        @endwhile --}}

        <!-- Scripts -->
        @routes
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-light hold-transition sidebar-mini sidebar-collapse layout-fixed">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="/flow-logo2.svg" alt="Flow.edu" height="240" width="240">
        </div>
        @inertia
    </body>
</html>
