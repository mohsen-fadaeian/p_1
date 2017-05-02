const { mix } = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css');


mix.styles([
    'resources/assets/css/bootstrap-rtl.min.css',
    'resources/assets/css/components.css',
    'resources/assets/css/core.css',
    'resources/assets/css/icons.css',
    'resources/assets/css/menu.css',
    'resources/assets/css/pages.css',
    'resources/assets/css/responsive.css',
    'resources/assets/css/variables.css'
],'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/bootstrap-rtl.min.js',
    'resources/assets/js/libs/detect.js',
    'resources/assets/js/libs/fastclick.js',
    'resources/assets/js/libs/jquery.app.js',
    'resources/assets/js/libs/jquery.blockUI.js',
    'resources/assets/js/libs/jquery.core.js',
    'resources/assets/js/libs/jquery.min.js',
    'resources/assets/js/libs/jquery.nicescroll.js',
    'resources/assets/js/libs/jquery.scrollTo.min.js',
    'resources/assets/js/libs/jquery.slimscroll.js',
    'resources/assets/js/libs/modernizr.min.js',
    'resources/assets/js/libs/pace.min.js',
    'resources/assets/js/libs/waves.js',
    'resources/assets/js/libs/wow.min.js'
],'public/js/libs.js');