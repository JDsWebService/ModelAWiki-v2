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
   .sass('resources/assets/sass/errors/error.scss', 'public/css/errors'); // Main Layout CSS

mix.browserSync('http://localhost:8000');
