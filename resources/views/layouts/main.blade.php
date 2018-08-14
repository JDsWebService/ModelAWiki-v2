<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.main._head')
        
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')
        
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
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
