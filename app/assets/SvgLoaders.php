<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class SvgLoaders extends AssetBundle
{
    public $sourcePath = '@npm/svg-loaders';

    public $css = [
        'svg-css-loaders',
    ];
}
