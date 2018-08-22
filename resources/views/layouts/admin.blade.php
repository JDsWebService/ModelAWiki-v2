<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.global._head')

        <!-- Styles -->
        <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
        
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')

        <title>{{ config('app.name', 'Laravel') }} Admin - @yield('title')</title>
        
    </head>

    <body>
        @component('components.auth-debug')
        @endcomponent
        <div id="app">

            {{-- Navigation Bar --}}
            @include('partials.admin._navbar')
            
            <div class="container">

                <div class="row justify-content-center mt-3">
                    @auth('admin')
                    <div class="col-sm-3">
                        <h3>Sidebar</h3>
                        <hr>
                        @include('partials.admin._sidebar')
                    </div>
                    @endauth
                    <div class="col-sm-9">
                        <h3>@yield('title')</h3>
                        <hr>
                        
                        {{-- Flash Messages --}}
                        @include('partials.global._messages')

                        {{-- Page Content --}}
                        @yield('content')
                    </div>
                </div>

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
