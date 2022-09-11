<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class Alpinejs extends AssetBundle
{
    public $sourcePath = '@npm/alpinejs';

    public $js = [
        "dist/cdn.min.js",
    ];

    public $css = [
    ];
}
