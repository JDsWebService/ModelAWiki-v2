<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        {{-- Header --}}
        @include('partials.global._head')
        
        {{-- Main Layout CSS --}}
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">

        {{-- Forum Global Stylesheets --}}
        <style type="text/css">
            a:hover {
                text-decoration-color: none !important;
                text-decoration-line: none !important;
                text-decoration-style: none !important;
            }
            
            /* Forum Post */
            .profile-image {
                width: 100px;
            }
            .badge-category {
                color: white;
            }
            .post-preview-link div[class^="col-"] {
                color: black;
            }
            .post-preview-link:hover div[class^="col-"] {
                background: #eee;
            }
            
            /* Title Text Black */
            .text-black {
                color: black;
            }
            .text-black:hover {
                color: #444;
            }
        </style>
        
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

            <div id="forum_header" class="carousel" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="http://via.placeholder.com/1280x150" alt="Featured Image">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Welcome to the Forums</h3>
                            <p>Forum Description Will Go Here</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row">

                    {{-- Sidebar --}}
                    <div class="col-sm-3">
                        @include('forum.partials._sidebar')
                    </div> <!-- /.col-sm-3 -->

                    <div class="col-sm-9">
                        
                        {{-- Flash Messages --}}
                        @include('partials.global._messages')

                        {{-- Page Content --}}
                        @yield('content')

                    </div> <!-- /.col-sm-9 -->

                </div>
            </div>

            {{-- Footer --}}
            @include('partials.global._footer')

        </div> <!-- /.app -->

        <!-- Scripts -->
        @include('partials.global._scripts')

        {{-- Tiny MCE --}}
        <script src="/js/tinymce/tinymce.min.js"></script>
        
        {{-- Page Specific Scripts --}}
        @yield('scripts')

    </body>

</html>
