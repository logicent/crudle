<?php

namespace app\assets;

use yii\web\AssetBundle;

class QuillAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/quill/quill.snow.css",
    ];
    public $js = [
        "js/quill/quill.min.js",
    ];
}
