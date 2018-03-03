let mix = require('laravel-mix')

/*
 |--------------------------------------------------------------------------
 | Admin panel assets
 |--------------------------------------------------------------------------
 */

mix.styles([
  'resources/assets/admin/css/bootstrap.min.css',
  'resources/assets/admin/css/font-awesome.min.css',
  //'resources/assets/admin/css/ionicons.min.css',
  'resources/assets/admin/css/animate.min.css',
  'resources/assets/admin/css/select2.min.css',
  'resources/assets/admin/css/dataTables.bootstrap.min.css',
  //'resources/assets/admin/css/pace.min.css',
  'resources/assets/admin/css/AdminLTE.min.css',
  'resources/assets/admin/css/_all-skins.min.css',
  'resources/assets/admin/css/customize.ltr.css',
], 'public/assets/admin/css/admin.ltr.min.css');

mix.styles([
  'resources/assets/admin/css/bootstrap.min.css',
  'resources/assets/admin/css/bootstrap.rtl.min.css',
  'resources/assets/admin/css/font-awesome.min.css',
  //'resources/assets/admin/css/ionicons.min.css',
  'resources/assets/admin/css/animate.min.css',
  'resources/assets/admin/css/select2.min.css',
  'resources/assets/admin/css/dataTables.bootstrap.min.css',
  //'resources/assets/admin/css/pace.min.css',
  'resources/assets/admin/css/AdminLTE.RTL.css',
  'resources/assets/admin/css/_all-skins.min.css',
  'resources/assets/admin/css/customize.rtl.css',
], 'public/assets/admin/css/admin.rtl.min.css');

mix.scripts([
  'resources/assets/admin/js/jquery.min.js',
  'resources/assets/admin/js/bootstrap.min.js',
  'resources/assets/admin/js/select2.min.js',
  'resources/assets/admin/js/pace.min.js',
  'resources/assets/admin/js/jquery.slimscroll.min.js',
  'resources/assets/admin/js/fastclick.js',
  'resources/assets/admin/js/adminlte.min.js',
  'resources/assets/admin/js/demo.js',
], 'public/assets/admin/js/admin.ltr.min.js');

mix.copy('resources/assets/admin/fonts', 'public/assets/admin/fonts')
mix.copy('resources/assets/admin/img', 'public/assets/admin/img')
mix.copy('resources/assets/admin/js/ckeditor', 'public/assets/admin/js/ckeditor')

/*
 |--------------------------------------------------------------------------
 | Web site assets
 |--------------------------------------------------------------------------
 */

mix.sass('resources/assets/web/sass/web-ltr.scss', 'public/assets/web/css')
  .sass('resources/assets/web/sass/web-rtl.scss', 'public/assets/web/css')

mix.scripts([
  'resources/assets/web/js/lodash.js',
  'resources/assets/web/js/jquery.js',
  'resources/assets/web/js/popper.min.js',
  'resources/assets/web/js/bootstrap.min.js',
  'resources/assets/web/js/owl.carousel.js',
  'resources/assets/web/js/lightgallery.js',
  'resources/assets/web/js/vue.js',
  'resources/assets/web/js/axios.min.js',
  'resources/assets/web/js/script.js'
], 'public/assets/web/js/web.js')
