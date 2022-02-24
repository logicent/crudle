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
    // public $sourcePath = '@bower/semantic/dist'; 
    public $css = [
        'css/main.css', // custom CSS
        // 'https://cdn.jsdelivr.net/alertifyjs/1.9.0/css/alertify.min.css',
        // '//cdn.jsdelivr.net/alertifyjs/1.9.0/css/themes/default.min.css',
        // '//cdn.jsdelivr.net/alertifyjs/1.9.0/css/themes/semantic.min.css',
    ];
    public $js = [
        // 'js/main.js', // custom JS
        // 'js/dropzone.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.9.0/alertify.min.js',
        // 'https://cdn.jsdelivr.net/alertifyjs/1.9.0/alertify.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/gcal.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/quill/1.2.2/quill.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset', // !!! required if method POST is used in (anchor) element(s)
        // 'yii\web\JqueryAsset', // loaded as dependency
        // 'Zelenin\yii\SemanticUI\assets\SemanticUICSSAsset', // loaded as dependency
        'Zelenin\yii\SemanticUI\assets\SemanticUIJSAsset'
    ];
}
