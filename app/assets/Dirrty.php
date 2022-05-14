<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class Dirrty extends AssetBundle
{
    public $sourcePath = '@bower/dirrty';
    public $js = [
        "dist/jquery.dirrty.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
