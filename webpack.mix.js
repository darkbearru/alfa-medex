const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix
    .webpackConfig({
        stats: {
            children: true,
        },
        module: {
            rules: [
                {
                    test: /\.(postcss)$/,
                    use: [
                        'vue-style-loader',
                        {loader: 'css-loader', options: {importLoaders: 1}},
                        'postcss-loader'
                    ]
                }
            ]
        }
    })
    .js('resources/js/app.js', 'public/js')
    .sourceMaps(!mix.inProduction())
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
            require('tailwindcss'),
            //require('autoprefixer')
        ]
    )
    .alias({
        '@': 'resources/js',
    });

if (mix.inProduction()) {
    mix.version();
}
