<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/core.css',
        'css/shortcode/shortcodes.css',
        'css/style.css',
        'css/responsive.css',
        'css/custom.css',
        'css/material-design-iconic-font.min.css',
         'css/jquery-ui.min.css',
    ];
    public $js = [
        'js/vendor/jquery-1.12.0.min.js',
        'js/bootstrap.min.js',
        'js/plugins.js',
        'js/slick.min.js',
        'js/owl.carousel.min.js',
        'js/waypoints.min.js',
        'js/main.js',
        'js/bascket.js',
          
        'js/order.js',
        
      
        'js/jquery.js',
        'js/jquery.easing.js',
        'js/jquery.scrollTo.js',
       'js/input_validation.js',
     // 'js/custom_search_results.js',

        'js/jquery.inputmask.bundle.js',

    ];
    /* public $css = [
        'css/site.css',
        'css/header.css',
        'css/default.css',
        'css/footer.css',
        'css/shortcodes.css',
        'css/slider.css',
        
        'css/responsive.css',
        'css/bootstrap.min.css',
        'css/core.css',
        'css/custom.css',
        'css/jquery-ui.min.css',
        'css/style-customizer.css',

        'css/style.css',

        
        'css/bootstrap.css',
        'css/bootstrap-responsive.css',
        'css/documenter_style.css',

        'css/material-design-iconic-font.min.css',
    ];
    */
    public $depends = [
       // 'yii\web\YiiAsset',
       // 'yii\bootstrap4\BootstrapAsset',
    ];
}
