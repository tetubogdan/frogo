const mix = require('laravel-mix');

// Copiază fișierele AdminLTE în public/vendor/adminlte
mix.copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/vendor/adminlte/dist/css')
   .copy('node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css', 'public/vendor/adminlte/plugins/fontawesome-free/css')
   .copy('node_modules/admin-lte/plugins/jquery/jquery.min.js', 'public/vendor/adminlte/plugins/jquery')
   .copy('node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/vendor/adminlte/plugins/bootstrap/js')
   .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/vendor/adminlte/dist/js');

// Alte configurări Laravel Mix pot merge aici
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
