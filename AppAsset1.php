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
       // 'css/site.css',
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

        
        'css/bootstrap.css',
        'css/bootstrap-responsive.css',
        'css/documenter_style.css',
    ];
    
    public $depends = [
       // 'yii\web\YiiAsset',
       // 'yii\bootstrap4\BootstrapAsset',
    ];
}
