const mix = require('laravel-mix')

// 编译前台资源
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/share.js', 'public/js/share.js')
    .js('resources/js/contact.js', 'public/js/contact.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/share.scss', 'public/css/share.css');

// 编译后台资源
mix.js('resources/js/admin.js', 'public/js/admin.js')
   .js('resources/js/chart.js', 'public/js/chart.js')
   .js('resources/js/table.js', 'public/js/table.js')
   .sass('resources/sass/admin.scss', 'public/css/admin.css');

mix.copy('node_modules/@fortawesome/fontawesome-free/css/all.css', 'public/css/fontawesome.css')
    .copy('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css', 'public/css/table.css');