<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class PicoCss extends AssetBundle
{
    public $sourcePath = '@npm/picocss--pico';

    public $css = [
        'css/pico.min.css',
    ];
}
