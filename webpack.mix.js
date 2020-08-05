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

mix.copy('resources/dist/img/AdminLTELogo.png', 'public/images', false );
mix.copy('resources/dist/img/avatar5.png', 'public/images', false );

// mix.webpackConfig({ node: { fs: 'empty' }})
