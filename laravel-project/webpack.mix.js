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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/main.scss', 'public/css')
<<<<<<< HEAD
    .sass('resources/sass/app.scss', 'ide/css');
=======
    .sass('resources/sass/ide.scss', 'public/css');
>>>>>>> dd2c658f5cbd6bcb867860820c21f9dfca3ea91f
