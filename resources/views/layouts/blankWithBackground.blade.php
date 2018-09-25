<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.global._head')

        {{-- Bootstrap Theme Slate from Bootswatch --}}
        <link rel="stylesheet" href="/css/admin/app.css">
        
        <style type="text/css">

            .wrapper {
                height: 100vh;
                background: url('/images/admin/login_background.jpg') fixed;
                background-size: cover;
                padding: 0;
                margin: 0;
            }

            .wrapper .container {
                background: rgba(0,0,0,0.4);
                color: white;
                height: inherit;
                max-width: 100vw;
            }

        </style>
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')

        <title>{{ config('app.name', 'Laravel') }} Admin - @yield('title')</title>
        
    </head>

    <body>

        <div class="wrapper">
            <div class="container mx-0">
                
                @yield('content')

            </div>
        </div>

        <!-- Scripts -->
        @include('partials.global._scripts')
            
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
