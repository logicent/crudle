<?php

namespace crudle\app\main\assets;

use yii\web\AssetBundle;

class Dirrty extends AssetBundle
{
    public $sourcePath = '@npm/dirrty';

    public $js = [
        "dist/jquery.dirrty.js",
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
