const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/backend/css', 'public/backend/css')
    .copy('resources/backend/js', 'public/backend/js')
    .copy('resources/backend/img', 'public/backend/img')
    .copy('resources/backend/fonts', 'public/backend/fonts')
