const mix = require('laravel-mix');

mix.js('resources/js/src/index.js', 'public/js')  // Compiling React entry point
   .react()  // For React support
   // .sass('resources/sass/app.scss', 'public/css')  // If you are using SASS/SCSS
   .version();  // For cache busting

