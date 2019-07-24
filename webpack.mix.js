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

//mix.js('resources/assets/js/app.js', 'public/js')
  // .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/adminback/dist/css/adminlte.min.css',
    'public/adminback/plugins/datatables/dataTables.bootstrap4.css',
	'adminback/plugins/colorpicker/bootstrap-colorpicker.min.css',
	'adminback/plugins/select2/select2.min.css'	
],  'public/newAdmin/all.css');


mix.scripts([
    'public/adminback/plugins/jquery/jquery.min.js',
    'public/adminback/plugins/bootstrap/js/bootstrap.bundle.min.js',
	'public/adminback/dist/js/adminlte.js',
	'public/adminback/dist/js/demo.js',
	'public/adminback/plugins/sparkline/jquery.sparkline.min.js',
	'public/adminback/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
	'public/adminback/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
	'public/adminback/plugins/slimScroll/jquery.slimscroll.min.js',
	'public/adminback/dist/js/pages/dashboard2.js',
	'public/adminback/plugins/datatables/jquery.dataTables.js',
	'public/adminback/plugins/datatables/dataTables.bootstrap4.js',
	'public/adminback/plugins/fastclick/fastclick.js',
	'public/adminback/plugins/colorpicker/bootstrap-colorpicker.min.js',
	'public/adminback/plugins/iCheck/icheck.min.js',
	'public/adminback/plugins/select2/select2.full.min.js'
], 'public/newAdmin/all.js');
   
