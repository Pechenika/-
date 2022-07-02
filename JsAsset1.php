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
        'js/script.js',
        'js/scripts.js',
        'js/bascket.js',
        'js/order.js',
        'js/filter.js',
        'js/main.js',
        'js/bootstrap-min.js',
        'js/jquery.easing.js',
        'js/jquery.scrollTo.js',
        'js/jquery.js',
        
        'js/script1.js',
        
    ];
    public $jsOptions = ['position' => \Yii\web\View::POS_HEAD];
    public $depends = [
       // 'yii\web\YiiAsset',
       // 'yii\bootstrap4\BootstrapAsset',
    ];
}
