<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.admin._head')
        
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')
        
    </head>

    <body>
        <div id="app">

            {{-- Navigation Bar --}}
            @include('partials.admin._navbar')
            
            <div class="container">

                <div class="row mt-3">
                    <div class="col-sm-3">
                        <h3>Sidebar</h3>
                        <hr>
                        @include('partials.admin._sidebar')
                    </div>
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
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
