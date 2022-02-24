<?php

namespace app\assets;

use yii\web\AssetBundle;

class ListJsAsset extends AssetBundle
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
