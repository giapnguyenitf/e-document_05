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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('resources/assets/css/style.css', 'public/css/style.css')
   .copy('resources/assets/css/', 'public/css/')
   .copy('resources/assets/images/', 'public/images/')
   .copy('node_modules/font-awesome/fonts/', 'public/fonts')
   .sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/css')
   .copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css/')
   .copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/')
   .copy('node_modules/jquery/dist/jquery.js', 'public/js')
   .copy('resources/assets/js/upload.js', 'public/js');
