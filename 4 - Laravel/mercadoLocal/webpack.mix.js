const mix = require('laravel-mix');

mix.version()
mix.js(['resources/js/app.js'], 'public/js/script.js')
mix.sass('resources/sass/app.scss', 'public/css/style.css')

