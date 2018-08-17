let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/app.scss', 'public/css') // Main Layout CSS
   .sass('resources/assets/sass/admin/app.scss', 'public/css/admin') // Admin CSS
   .copy('resources/assets/css/slider.css', 'public/css') // CSS Button Slider
   .copy('resources/assets/js/imageupload.js', 'public/js') // CSS Button Slider
   .copy('resources/assets/js/tinymce', 'public/js/tinymce'); // TinyMCE Editor

mix.browserSync('http://localhost:8000');
