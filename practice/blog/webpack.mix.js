const mix = require('laravel-mix')

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/share.js', 'public/js/share.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/share.scss', 'public/css/share.css');
