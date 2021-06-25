const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')


// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */



mix
// .js('resources/midone/js/app.js', 'public/midone/dist/js')
// //     // .js('resources/midone/js/ckeditor.js', 'public/midone/dist/js')
// .sass('resources/midone/sass/app.scss', 'public/midone/dist/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .autoload({
        'cash-dom': ['$']
    })

// .combine([
//     'resources/js/alpine.js',
//     'resources/js/init-alpine.js'
// ], 'public/js/alpine.js')