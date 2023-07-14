<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
         //<!-- Google font-->
        'https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap',
        'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap',
        'themes/assets/css/font-awesome.css',
        //  <!-- ico-font-->
        'themes/assets/css/vendors/icofont.css',
         // <!-- Themify icon-->
        'themes/assets/css/vendors/themify.css',
        // <!-- Flag icon-->
        'themes/assets/css/vendors/flag-icon.css',
        //<!-- Feather icon-->
        'themes/assets/css/vendors/feather-icon.css',
        //<!-- Plugins css start-->
        'themes/assets/css/vendors/scrollbar.css',
        'themes/assets/css/vendors/animate.css',
        'themes/assets/css/vendors/chartist.css',
        'themes/assets/css/vendors/date-picker.css',
        //<!-- Plugins css Ends-->

        //<!-- Bootstrap css-->
        'themes/assets/css/vendors/bootstrap.css',
        // <!-- App css-->
        'themes/assets/css/style.css',
        'themes/assets/css/color-1.css',
       //<!-- Responsive css-->
        'themes/assets/css/responsive.css',

        'css/site.css'
    ];
    public $js = [
       // <!-- latest jquery-->
      'themes/assets/js/jquery-3.5.1.min.js',
       // <!-- Bootstrap js-->
      'themes/assets/js/bootstrap/bootstrap.bundle.min.js',
       // <!-- feather icon js-->
        'themes/assets/js/icons/feather-icon/feather.min.js',
        'themes/assets/js/icons/feather-icon/feather-icon.js',
       // <!-- scrollbar js-->
        'themes/assets/js/scrollbar/simplebar.js',
        'themes/assets/js/scrollbar/custom.js',
      //  <!-- Sidebar jquery-->
        'themes/assets/js/config.js',
       // <!-- Plugins JS start-->
        'themes/assets/js/sidebar-menu.js',
        'themes/assets/js/chart/chartist/chartist.js',
        'themes/assets/js/chart/chartist/chartist-plugin-tooltip.js',
        'themes/assets/js/chart/knob/knob.min.js',
        'themes/assets/js/chart/knob/knob-chart.js',
        'themes/assets/js/chart/apex-chart/apex-chart.js',
        'themes/assets/js/chart/apex-chart/stock-prices.js',
        'themes/assets/js/notify/bootstrap-notify.min.js',
        'themes/assets/js/dashboard/default.js',
        'themes/assets/js/notify/index.js',
        'themes/assets/js/datepicker/date-picker/datepicker.js',
        'themes/assets/js/datepicker/date-picker/datepicker.en.js',
        'themes/assets/js/datepicker/date-picker/datepicker.custom.js',
        'themes/assets/js/typeahead/handlebars.js',
        'themes/assets/js/typeahead/typeahead.bundle.js',
        'themes/assets/js/typeahead/typeahead.custom.js',
        'themes/assets/js/typeahead-search/handlebars.js',
        'themes/assets/js/typeahead-search/typeahead-custom.js',
      //  <!-- Plugins JS Ends-->
      //  <!-- Theme js-->
        'themes/assets/js/script.js',
        'themes/assets/js/theme-customizer/customizer.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
