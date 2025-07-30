const mix = require('laravel-mix');

// Set public path
mix.setPublicPath('./assets');

// Compile SASS
mix.sass('src/scss/main.scss', 'css')
   .options({
       processCssUrls: false,
       postCss: [
           require('autoprefixer'),
           require('cssnano')({
               preset: ['default', {
                   discardComments: {
                       removeAll: true,
                   },
               }]
           })
       ]
   });

// Compile JavaScript
mix.js('src/js/main.js', 'js')
   .js('src/js/navigation.js', 'js');

// Copy images
mix.copyDirectory('src/images', 'assets/images');

// Browser sync for live reload
mix.browserSync({
    proxy: 'localhost:8080',
    files: [
        'assets/css/*.css',
        'assets/js/*.js',
        '**/*.php'
    ]
});

// Production optimizations
if (mix.inProduction()) {
    mix.version();
}