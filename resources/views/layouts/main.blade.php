<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.global._head')
        
        {{-- Main Layout CSS --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        
    </head>

    <body>
        <div id="app">
            
            {{-- Flash Messages --}}
            @include('partials.global._messages')
            
            {{-- Navigation Bar --}}
            @include('partials.main._navbar')

            {{-- Page Content --}}
            <div class="container mt-4">
                @yield('content')

                {{-- Footer --}}
                @include('partials.global._footer')
            </div>

        </div> <!-- /.app -->

        <!-- Scripts -->
        @include('partials.global._scripts')
        
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
