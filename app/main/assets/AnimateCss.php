<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class AnimateCss extends AssetBundle
{
    public $sourcePath = '@npm/animate.css';

    public $js = [
    ];

    public $css = [
        'animate.min.css',
    ];
}
