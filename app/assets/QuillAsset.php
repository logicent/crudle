<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class QuillAsset extends AssetBundle
{
    public $sourcePath = '@bower/quill';

    public $css = [
        "src/quill.snow.css",
    ];
    public $js = [
        "src/quill.min.js",
    ];
}
