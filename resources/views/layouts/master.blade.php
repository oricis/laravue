@php
    $env = \Illuminate\Support\Facades\App::environment();

    $bodyClassName = 'demo';
    $resourceName = 'products';
@endphp

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <link href="{{ asset('css/vendor/ironwoods/buttons-bootstrap-based.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <script defer src="{{ asset('js/vendor/ironwoods/traces.js') }}"></script>
        <script defer src="{{ asset('js/common.js') }}"></script>
        <script defer src="{{ asset('js/app.js') }}"></script>

        @stack('scripts')
        @auth
            @stack('private-classes')
            @stack('private-scripts')
        @else
            @stack('public-classes')
            @stack('public-scripts')
        @endauth
    </head>

    <body class="{{ $bodyClassName }}" id="top"
        data-short-resource="{{ $resourceName }}">

        <header>
            <h1>Laravue Demo</h1>
        </header>

        <nav class="sidebar"></nav>
        <main>
            <article id="page-content"
                @stack('page-content-attrs')
                data-route="{{ $route ?? '' }}">
                @yield('content')
            </article>
        </main>

        <footer>
            Moisés Alcocer, {{ date('Y') }}
        </footer>
    </body>
</html>
