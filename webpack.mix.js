const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
]);



mix.scripts([
    'node_modules/alpinejs/dist/alpine.js',
    'public/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
    'public/argon/vendor/js-cookie/js.cookie.js',
    'public/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
    'public/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
    'public/argon/js/argon.min.js',
],
'public/js/app.bundle.min.js').version();