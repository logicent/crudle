<?php

namespace crudle\app\assets;

use yii\web\AssetBundle;

class ListJs extends AssetBundle
{
    public $sourcePath = '@bower/list.js';
    public $css = [
    ];
    public $js = [
        "dist/list.js",
    ];
    // public $depends = [
    //     'yii\web\JqueryAsset'
    // ];
}
