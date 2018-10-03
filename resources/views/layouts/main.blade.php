<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.global._head')
        
        {{-- Main Layout CSS --}}
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        
    </head>

    <body>
        @component('components.debug.auth')
        @endcomponent
        <div id="app">
            
            {{-- Navigation Bar --}}
            @include('partials.main._navbar')

            {{-- Flash Messages --}}
            @include('partials.global._messages')

            {{-- Page Content --}}
            @yield('content')

            {{-- Footer --}}
            @include('partials.main._footer')

        </div> <!-- /.app -->

        <!-- Scripts -->
        @include('partials.global._scripts')
        
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
