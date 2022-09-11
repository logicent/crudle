<?php

namespace crudle\app\assets;

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
