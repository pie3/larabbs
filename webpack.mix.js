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

/**
 * version() 函数的调用，解决浏览器静态文件缓存问题
 * 注意：webpack.mix.js 文件只在 npm run watch-poll 指令执行时引入，之后指令后台运行不再重新引入。
 * 如果你后台运行 watch-poll 命令的话，需关闭 watch-poll 服务（Ctrl + C），再次启动（ npm run watch-poll ）即可生效。
 * 参考：https://learnku.com/courses/laravel-intermediate-training/8.x/css-versioning/9903
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
