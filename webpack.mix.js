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
    .sass('resources/sass/app.scss', 'public/css').sourceMaps();
// mix.js('node_modules/popper.js/dist/popper.js', 'public/js');

// mix.styles([
//     'resources/plugins/fontawesome-free/css/all.min.css',
//     'resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
//     'resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
//     'resources/plugins/jqvmap/jqvmap.min.css',
//     'resources/dist/css/adminlte.min.css',
//     'resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
//     'resources/plugins/daterangepicker/daterangepicker.css',
//     'resources/plugins/summernote/summernote-bs4.min.css',

// ], 'public/css/all.css');

// mix.combine([
//     'resources/plugins/jquery/jquery.min.js',
//     'resources/plugins/jquery-ui/jquery-ui.min.js',
//     'resources/plugins/moment/moment.min.js',
//     'resources/plugins/daterangepicker/daterangepicker.js',
//     'resources/dist/js/adminlte.js',
// ], 'public/js/all.css');

mix.copyDirectory('resources/dist', 'public/dist' );
mix.copyDirectory('resources/plugins', 'public/plugins' );


mix.copy('resources/dist/img/AdminLTELogo.png', 'public/images', false );
mix.copy('resources/dist/img/avatar5.png', 'public/images', false );

// mix.webpackConfig({ node: { fs: 'empty' }})
