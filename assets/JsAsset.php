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
class JsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
   public $js = [
   'js/vendor/modernizr-2.8.3.min.js',
        /*'js/script.js',
        'js/scripts.js',
        'js/bascket.js',
        'js/order.js',
        'js/filter.js',
        'js/main.js',
        'js/bootstrap-min.js',
        'js/jquery.easing.js',
        'js/jquery.scrollTo.js',
        'js/jquery.js',
        'js/vendor/jquery-1.12.0.min.js',
        
        'js/script1.js',
        'js/plugins.js',
        'js/slick.min.js',
        'js/waypoints.min.js',*/
        
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
       // 'yii\web\YiiAsset',
       // 'yii\bootstrap4\BootstrapAsset',
    ];
}
