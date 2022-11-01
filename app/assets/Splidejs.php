<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class Splidejs extends AssetBundle
{
    public $sourcePath = '@npm/splidejs--splide';

    public $js = [
        "dist/js/splide.min.js",
    ];

    public $css = [
        "dist/css/splide.min.css",
        // "dist/css/themes/splide-sea-green.min.css",
        // "dist/css/themes/splide-skyblue.min.css",
    ];
}
