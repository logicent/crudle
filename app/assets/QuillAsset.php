<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class QuillAsset extends AssetBundle
{
    public $sourcePath = '@bower/quill';

    public $css = [
    ];

    public $js = [
        "quill.js",
        "themes/snow.js",
    ];
}
