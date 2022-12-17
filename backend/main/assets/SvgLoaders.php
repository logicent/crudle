<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class SvgLoaders extends AssetBundle
{
    public $sourcePath = '@npm/svg-loaders';

    public $css = [
        'svg-css-loaders',
    ];
}
