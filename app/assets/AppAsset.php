<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace crudle\app\assets;

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
        'css/main.css',
    ];

    public $js = [
        // 'js/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset', // !!! required if method POST is used in (anchor) element(s)
        // 'yii\web\JqueryAsset', // loaded as dependency
        // 'icms\FomanticUI\assets\CSSAsset', // loaded as dependency
        'icms\FomanticUI\assets\JSAsset'
    ];
}
