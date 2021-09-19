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

mix.js('resources/assets/js/app.js', 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.combine([
				'public/css/app.css',
				'node_modules/@claviska/jquery-minicolors/jquery.minicolors.css',
				'node_modules/bootstrap/dist/css/bootstrap.css',
				'node_modules/bootstrap/dist/css/bootstrap-theme.css',
				'node_modules/bootstrapvalidator/dist/css/bootstrapValidator.css',
				'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
				'node_modules/datatables.net-responsive-bs/css/responsive.bootstrap.css',
				'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
				], 'public/css/app.css')
;
