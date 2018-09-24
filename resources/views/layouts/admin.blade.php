<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.global._head')

        {{-- Admin Template Specific CSS --}}
            <!-- Custom Scrollbar CSS -->
            <link rel="stylesheet" href="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
            
            {{-- Bootstrap Theme Slate from Bootswatch --}}
            <link rel="stylesheet" href="/css/admin/app.css">
            {{-- Custom Admin Template CSS --}}
            <link rel="stylesheet" href="/css/admin/custom.css">
            {{-- Sidebar CSS --}}
            <link rel="stylesheet" href="/css/admin/sidebar.css">
            <link rel="stylesheet" href="/css/admin/sidebar-themes.css">
            
        
        {{-- Page Specific Stylesheets --}}
        @yield('stylesheets')

        <title>{{ config('app.name', 'Laravel') }} Admin - @yield('title')</title>
        
    </head>

    <body>
    
        {{-- Page Wrapper --}}
        <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
            
            {{-- Sidebar --}}
            @include('partials.admin._sidebar')

            <main class="page-content">
                <div class="container-fluid">
                    
                    <h3>@yield('title')</h3>
                    <hr>
                    
                    {{-- Flash Messages --}}
                    @include('partials.global._messages')

                    @yield('content')

                    {{-- Footer --}}
                    @include('partials.global._footer')
                </div>
            </main> <!-- /.page-content -->
            
        </div> <!-- /.page-wrapper -->

        <!-- Scripts -->
        @include('partials.global._scripts')
        
        {{-- Admin Template Specific JS --}}
            <script src="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="/js/admin/app.js"></script>
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
