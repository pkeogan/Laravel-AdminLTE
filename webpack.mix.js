   let mix = require('laravel-mix');
/*
    |--------------------------------------------------------------------------
    |     __                          __  ___     __      _      __ __________
    |    / /  ___ ________ __  _____ / / / _ |___/ /_ _  (_)__  / //_  __/ __/
    |   / /__/ _ `/ __/ _ `/ |/ / -_) / / __ / _  /  ' \/ / _ \/ /__/ / / _/  
    |  /____/\_,_/_/  \_,_/|___/\__/_/ /_/ |_\_,_/_/_/_/_/_//_/____/_/ /___/ 
    |--------------------------------------------------------------------------
    | Laravel AdminLTE Blade Intergration - By Peter Keogan
    |--------------------------------------------------------------------------
    |   Title : WebPack Mix File
    |   Desc  : Contains the config file so this package to find the needed files. Exports items to /public/
    |   Useage: Please Refer to readme.md 
    | 
    |
    */

 mix.less('resources/assets/adminlte/build/less/AdminLTE.less', 'public/css/adminlte.css')
    .less('resources/assets/adminlte/build/less/skins/_all-skins.less', 'public/css/_all-skins.css')
    //Compile Bootstrap
    .less('resources/assets/adminlte/bower_components/bootstrap/less/bootstrap.less', 'public/css/bootstrap.css')
    // Combine all CSS into style.css
    .combine([
        'public/css/bootstrap.css',
        'resources/assets/adminlte/bower_components/font-awesome/css/font-awesome.css',
        'resources/assets/adminlte/bower_components/Ionicons/css/ionicons.css',
        'public/css/adminlte.css',
        'public/css/_all-skins.css',
        'resources/assets/adminlte/plugins/iCheck/square/blue.css'
     ], 'public/css/style.css')

    // Favicons
    .copy('resources/assets/favicons/*', 'public/')

    //Move Fonts Over
    .copy('resources/assets/adminlte/bower_components/font-awesome/fonts/*', 'public/fonts/')
    .copy('resources/assets/adminlte/bower_components/Ionicons/fonts/*', 'public/fonts/')

    //Move Images Over
    .copy('resources/assets/adminlte/build/img', 'public/img/')

    // Combine All JS files into scripts.js
    .js([
        'resources/assets/adminlte/bower_components/moment/moment.js',
        'resources/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'resources/assets/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js',
        'resources/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'resources/assets/adminlte/bower_components/bootstrap-slider/bootstrap-slider.js',
        'resources/assets/adminlte/bower_components/fastclick/lib/fastclick.js',
        'resources/assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.js',
        'resources/assets/adminlte/bower_components/chart.js/Chart.min.js',
        'resources/assets/adminlte/dist/js/adminlte.js',
        'resources/assets/adminlte/plugins/iCheck/icheck.js',
    ], 'public/js/scripts.js')



if (mix.inProduction() || process.env.npm_lifecycle_event !== 'hot') {
    mix.version();
}